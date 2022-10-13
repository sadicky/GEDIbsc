<?php  
require_once('Models/user.class.php');
require_once('Models/historique.class.php');
require_once('Models/chat.class.php');
	    
	    

function inc_chat()
{
	$chat = new Chats();
	$user = new Users();
	$historique = new Historiques();
	//$assignUser= $chart->assignUser_group();
	include 'Vues/Chat/chatlist.php';

}
function inc_chatroom()
{
	$chat = new Chats();
	include 'Vues/Chat/chatroom.php';
}