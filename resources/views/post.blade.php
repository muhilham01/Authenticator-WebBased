<?php 
    foreach(Session::get('service') as $s){
        echo $s[0];
        echo $s[1];
    }
    
?>
<script defer> locaStorage.setItem('service', Session::get('service'))</script>