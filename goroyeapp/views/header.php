<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<title><?= $AppName ?></title>
 <link rel="stylesheet" href="<?php echo design_url();?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo design_url();?>css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo design_url();?>css/style.css">
</head>
<body>
<div class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo base_url(); ?>"><?= $AppName ?></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
            <img src="<?php echo design_url();?>images/task-50.png" width="50" height="50" alt="A Simple TodoListApp"/>
            </li>
            <li>
             <!-- Trigger the modal with a button -->
            <a href="#" data-toggle="modal" data-target="#TaskManager">Task Manager</a>
            </li>
             </ul>
          <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url(); ?>todobyweek"  title="" class="showtip">
                Todo By Week
                 <span class="tooltiptext">See task by week</span>
                </a>
          </li>
          <li>
           <a href="<?php echo base_url(); ?>alltodo" title="" class="showtip">
                All Todo List
                 <span class="tooltiptext">See all todo list</span>
            </a>
           </li>
          <li><a href="<?php echo base_url(); ?>about">About</a></li>
          </ul>

        </div>
      </div>
    </div>
 <div class="container">
    <div class="row">
<?php 
// open main view element here
//is closed at the view/footer.php
?>