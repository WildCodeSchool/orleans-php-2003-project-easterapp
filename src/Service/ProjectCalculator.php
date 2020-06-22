<?php

namespace App\Service;

use App\Entity\Project;

class ProjectCalculator
{
    const EXPERT_SPEED_COEFFICIENT = 1;
    const CONFIRMED_SPEED_COEFFICIENT = 1.5;
    const JUNIOR_SPEED_COEFFICIENT = 2;

    private function getVelocity(Project $project)
    {
        //calculate project team mean velocity
        $velocity = $project->getExpert() / 100 * self::EXPERT_SPEED_COEFFICIENT
            + $project->getConfirmed() / 100 * self::CONFIRMED_SPEED_COEFFICIENT
            + $project->getJunior() / 100 * self::JUNIOR_SPEED_COEFFICIENT;

        return $velocity;
    }

    public function calculateProjectLoad(Project $project, int $featureCategoryId = 0): float
    {
        //get theoretical (expert based) project load
        $velocity = $this->getVelocity($project);
        $features = $project->getProjectFeatures();
        $theoreticalLoad = 0;
        if ($featureCategoryId == 0) {
            foreach ($features as $feature) {
                $theoreticalLoad += $feature->getDay();
            }
        } else {
            foreach ($features as $feature) {
                if ($feature->getCategory() !== null && $featureCategoryId == $feature->getCategory()->getId()) {
                    $theoreticalLoad += $feature->getDay();
                }
            }
        }
        return round($theoreticalLoad * $velocity, 2);
    }
}
