<?php
if (isset($_POST['tasklist'])) {
    $task_list = $_POST['tasklist'];
} else {
    $task_list = array();

    // some hard-coded starting values to make testing easier
    $task_list[] = 'Write chapter';
    $task_list[] = 'Edit chapter';
    $task_list[] = 'Proofread chapter';
}

$errors = array();

switch( $_POST['action'] ) {
    case 'Add Task':
        $new_task = $_POST['newtask'];
        if (empty($new_task)) {
            $errors[] = 'The new task cannot be empty.';
        } else {
            array_push($task_list, $new_task); //edited for step 4
        }
        break;

    case 'Delete Task':
        $task_index = $_POST['taskid'];
        if(empty($task_index)){
          $errors[] = 'Select a Task to be deleted!';
        }
        else {
          unset($task_list[$task_index]);
          $task_list = array_values($task_list);
        }
        break;

    case 'Modify Task': //step 5
        $task_index = $_POST['taskid'];
        if (empty($task_index)) {
            $errors[] = 'An empty task cannot be modified!';
        } else {
            $task_to_modify = $task_list[$task_index];
        }
        break;

    case 'Save Changes':
        $task_index = $_POST['modifiedtaskid'];
        $task_name = $_POST['modifiedtask'];
        if (empty($task_index) || empty($task_name)) {
            $errors[] = 'Task cannot be modified!';
        } else {
            $task_list[$task_index] = $task_name;
        }
        break;

    case 'Cancel Changes':
      break;

    case 'Promote Task':
      $task_index = $_POST['taskid'];
      if (empty($task_index) || $task_index === 0) {
          $errors[] = 'Task cannot be promoted!';
      }
      else {
          $temp = $task_list[$task_index - 1];
          $task_list[$task_index - 1] = $task_list[$task_index];
          $task_list[$task_index] = $temp;
      }
      break;

    case 'Sort Tasks':
      sort($task_list);

}

include('task_list.php');
?>
