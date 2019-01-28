<?php
namespace Deepdivedylan\DataDesign;
// load the profile class

require_once(dirname(__DIR__, 1) . "/Classes/Author.php");

//use the constructor to create a new author
$test = new \Deepdivedylan\DataDesign\author("e462fab1-e72d-4730-b9d8-3f7b43bd5ae7",
	"nananananananananananananananana", "author.com", "email@email.com", "rararararararararararararararara", "author");
var_dump($test)
?>