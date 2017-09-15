<?php
/**
 * Crafty Moltin plugin for Craft CMS 3.x
 *
 * API wrapper for Moltin
 *
 * @link      https://www.vanmoof.com
 * @copyright Copyright (c) 2017 VanMoof
 */

namespace vanmoofcraftymoltin\craftymoltin\tasks;

use vanmoofcraftymoltin\craftymoltin\CraftyMoltin;

use Craft;
use craft\base\Task;

/**
 * CraftyMoltinTask Task
 *
 * Tasks let you run background processing for things that take a long time,
 * dividing them up into steps.  For example, Asset Transforms are regenerated
 * using Tasks.
 *
 * Keep in mind that tasks only get timeslices to run when Craft is handling
 * requests on your website.  If you need a task to be run on a regular basis,
 * write a Controller that triggers it, and set up a cron job to
 * trigger the controller.
 *
 * The pattern used to queue up a task for running is:
 *
 * use vanmoofcraftymoltin\craftymoltin\tasks\CraftyMoltinTask as CraftyMoltinTaskTask;
 *
 * $tasks = Craft::$app->getTasks();
 * if (!$tasks->areTasksPending(CraftyMoltinTaskTask::class)) {
 *     $tasks->createTask(CraftyMoltinTaskTask::class);
 * }
 *
 * https://craftcms.com/classreference/services/TasksService
 *
 * @author    VanMoof
 * @package   CraftyMoltin
 * @since     1.0.0
 */
class CraftyMoltinTask extends Task
{
    // Public Properties
    // =========================================================================

    /**
     * Some attribute
     *
     * @var string
     */
    public $someAttribute = 'Some Default';

    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }

    /**
     * Returns the total number of steps for this task.
     *
     * @return int The total number of steps for this task
     */
    public function getTotalSteps(): int
    {
        return 1;
    }

    /**
     * Runs a task step.
     *
     * @param int $step The step to run
     *
     * @return bool|string True if the step was successful, false or an error message if not
     */
    public function runStep(int $step)
    {
        return true;
    }

    // Protected Methods
    // =========================================================================

    /**
     * Returns a default description for [[getDescription()]], if [[description]] isn’t set.
     *
     * @return string The default task description
     */
    protected function defaultDescription(): string
    {
        return Craft::t('crafty-moltin', 'CraftyMoltinTask');
    }
}
