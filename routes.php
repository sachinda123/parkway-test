<?php
  function call($controller, $action) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'pages':
        require_once('models/home.php');
        $controller = new PagesController();
      break;
    case 'depAdd':
          // we need the model to query the database later in the controller
          require_once('models/depAdd.php');
          $controller = new DepaddController();
        break;
    //register
    case 'register':
          // we need the model to query the database later in the controller
          require_once('models/register.php');
          $controller = new DepaddController();
        break;
      case 'saveEmployee':
          // we need the model to query the database later in the controller
          require_once('models/saveEmployee.php');
          $controller = new DepaddController();
        break;
    case 'saveDepartment':
          // we need the model to query the database later in the controller
          require_once('models/saveDepartment.php');
          $controller = new DepaddController();
        break;
    case 'departmentEmployee':
          // we need the model to query the database later in the controller
          require_once('models/departmentEmployee.php');
          $controller = new DepaddController();
        break;
    case 'editEmployee':
          // we need the model to query the database later in the controller
          require_once('models/editEmployee.php');
          $controller = new DepaddController();
        break;
     case 'updateEmployee':
          // we need the model to query the database later in the controller
          require_once('models/updateEmployee.php');
          $controller = new DepaddController();
        break;
        case 'deleteEmployee':
          // we need the model to query the database later in the controller
          require_once('models/deleteEmployee.php');
          $controller = new DepaddController();
        break;
    //deleteEmployee
    }
    
    $controller->{ $action }();
  }

 
  // we're adding an entry for the new controller and its actions
  $controllers = array('pages' => ['home', 'error'],
                       'depAdd' => ['index'],
                       'saveEmployee' => ['index'],
                       'departmentEmployee'=> ['index'],
                       'saveDepartment'=> ['index'],
                       'editEmployee'=> ['index'],
                       'deleteEmployee'=> ['index'],
                       'updateEmployee'=> ['index'],
                       'register' => ['index', 'register']);
  //editEmployee
  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
      call($controller, $action);
    } else {
      call('pages', 'error');
    }
  } else {
    call('pages', 'error');
  }
?>