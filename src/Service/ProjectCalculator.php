<?php

namespace App\Service;

use App\Entity\Project;

class ProjectCalculator
{
    const EXPERT_SPEED_COEFFICIENT = 1;
    const CONFIRMED_SPEED_COEFFICIENT = 1.5;
    const JUNIOR_SPEED_COEFFICIENT = 2;

    public function getVelocity(Project $project)
    {
        //calculate project team mean velocity
        $velocity = $project->getExpert() / 100 * self::EXPERT_SPEED_COEFFICIENT
            + $project->getConfirmed() / 100 * self::CONFIRMED_SPEED_COEFFICIENT
            + $project->getJunior() / 100 * self::JUNIOR_SPEED_COEFFICIENT;

        return $velocity;
    }

    public function calculateProjectLoad(Project $project): float
    {
        //get theoretical (expert based) project load
        $velocity = $this->getVelocity($project);
        $theoreticalLoad = 0;
        $features = $project->getProjectFeatures();
        foreach ($features as $feature) {
            $theoreticalLoad += $feature->getDay();
        }

        //return
        return round($theoreticalLoad * $velocity, 2);
    }

    public function calculateProjectLoadByCategory(Project $project, int $featureCategoryId): float
    {
        $velocity = $this->getVelocity($project);
        $load = 0;
        $features = $project->getProjectFeatures();
        foreach ($features as $feature) {
            if ($featureCategoryId == $feature->getCategory()->getId()|null) {
                    $load += $feature->getDay();
            }
        }
        return round($load * $velocity, 2);
    }
}
