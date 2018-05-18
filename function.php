<?php 
    session_start();

    include 'connect.php';
    
    function table($page){
        if($page =="manage"){
             $connect = getDBConnection();
             $sql = "SELECT * FROM pet WHERE owner LIKE '" . $_SESSION['username'] . "'";
              $stmt = $connect->prepare($sql);
            $stmt->execute();
            $items = $stmt->fetchAll(); 
        }
        else{
             global $items;
        }
        $c=0;
       
        if(isset($items)){
            echo "<tr>
                  <th>Image</th>
                  <th>Type</th>
                  <th>Breed</th> 
                  <th>Name</th>
                  <th>Age</th>
                  <th>Price</th>";
             if(isset($_SESSION['username'])){
                 echo "<th>Contact</th></tr>";
             }else{
                 echo "</tr>";
             }
            foreach($items as $item)
            {
                $c++;
                $itemName = $item['name'];
                $itemType = $item['type'];
                $itemBreed = $item['breed'];
                $itemAge = $item['age'];
                $itemPrice = $item['cost'];
                $itemOwner = $item['owner'];
                $itemImage = $item['img'];
                $id = $item['id'];
                echo '<tr>';
                echo "<td><img src='$itemImage'></td>";
                echo "<td><h4>$itemType</h4></td>";
                echo "<td><h4 id='breed$itemName'>$itemBreed</h4></td>";
                echo "<td><h4>$itemName</h4></td>";
                echo "<td><h4>$itemAge years</h4></td>";
                echo "<td><h4>$$itemPrice</h4></td>";
                echo "<form method = 'post'>";
                // echo "<td><input type='text' id='itemOwner' value='$itemOwner'></td>";
                //  if(isset($_SESSION['username'])){
                 if($page=="manage"){
                     echo "<td><button class='btn-warning' id='button$c' value=$id onclick='deleteMe(this)' >Delete Entry</button></td>";
                 }
                 else if($page == "admin"){
                     echo "<td><button class='btn-success' id='addbutton$c' value=$id onclick='featured(this)' >Add To Featured</button></td>";
                     echo "<td><button class='btn-warning' id='button$c' value=$id onclick='deleteMe(this)' >Delete Entry</button></td>";
                 }
                 else{
                     echo "<td><button class='btn-success' id='button$c' value=$itemOwner onclick='clickMe(this)'/>Contact Owner</button></td>";
                     echo "<td><input type='hidden' id='Namebutton$c'value=$itemName></td>";
                     
                     
                }
                echo "</form>";
                echo "</tr>";
            }
    
            
        }
    }  

    function navBar(){
        echo ("<ul>");
        if(isset($_SESSION['username'])){
            echo ("<li style='float:right'><a href='logout.php'>Logout</a></li>
                   <li style='float:left'><h4 style='color:white'>" . $_SESSION['username']. "</h4></li>");
            if($_SESSION['username'] != "admin"){
                echo "<li style='float:right'><a href='managePets.php'>Manage Pets</a></li>";
            }
            else{
                echo "<li style='float:right'><a href='admin.php'>Manage Pets</a></li>";
            }
        }
        else{
            echo ("<li style='float:right'><a href='login.php'>Login</a></li>");
        }
        echo ("</ul>");
    }
    

    // function userTable(){
    //     $c=0;
    //     $connect = getDBConnection();
    //     $sql = "SELECT * FROM user";
    //     $stmt = $connect->prepare($sql);
    //     $stmt->execute();
    //     $items = $stmt->fetchAll(); 
        
    //     if(isset($items)){
    //         echo "<tr>
    //               <th>Username</th>
    //               <th>Contact</th></tr>";
    //         foreach($items as $item)
    //         {
    //             $c++;
    //             $itemName = $item['username'];
    //             $itemcontact= $item['contact'];
    //             $id = $item['id'];
    //             echo "<tr>";
    //             echo "<td><h4>$itemName</h4></td>";
    //             echo "<td><h4>$itemcontact</h4></td>";
    //             echo "<form method = 'post'>";
    //             echo "<td><button class='btn-warning' id='buttonM$c' value=$id onclick='' >Delete Entry</button></td>";
    //             echo "</form>";
    //             echo "</tr>";
    //         }
    //     }
    // }
    
    function getMatchingItems($page, $type, $startAge, $endAge, $startPrice, $endPrice) {
        $connect = getDBConnection();
        $sql = "SELECT * FROM pet";
        if($page == "manage"){
             $sql .= " WHERE owner LIKE '" . $_SESSION['username'] . "'";
        }
        else{
          if($type!=""){
              $sql .= " WHERE type LIKE '" . $type ."'";
              if($startAge != -1){
                  $sql .= " AND age >= '" . $startAge . "'";
              }
              
              if($endAge != -1){
                  $sql .= " AND age <= '" . $endAge . "'"; 
              }
              
              if($startPrice != -1){
                  $sql .= " AND cost >= '" . $startPrice . "'";
              }
              
              if($endPrice != -1){
                  $sql .= " AND cost <= '" . $endPrice . "'"; 
              }
          }
          else{
              $flag = false;
             if($startAge != -1){
                 if($flag == true){
                     $sql .= " AND ";
                 }
                 if($false == false){
                     $sql .= " WHERE ";
                     $false = true;
                 }
                  $sql .= " age >= '" . $startAge . "'";
              }
              
              if($endAge != -1){
                if($flag == true){
                     $sql .= " AND ";
                 }
                 if($false == false){
                     $sql .= " WHERE ";
                     $false = true;
                 }
                  $sql .= " age <= '" . $endAge . "'"; 
              }
              
              if($startPrice != -1){
                if($flag == true){
                     $sql .= " AND ";
                 }
                 if($false == false){
                     $sql .= " WHERE ";
                     $false = true;
                 }
                  $sql .= " cost >= '" . $startPrice . "'";
              }
              
              if($endPrice != -1){
                if($flag == true){
                     $sql .= " AND ";
                 }
                 if($false == false){
                     $sql .= " WHERE ";
                     $false = true;
                 }
                  $sql .= " cost <= '" . $endPrice . "'"; 
              }
              
          }
        //   echo "<script>console.log( '" . $sql . "' );</script>";
        }
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $items = $stmt->fetchAll(); 
        return $items; 
}
    
function footer($page){
     $connect = getDBConnection();
     $sql = "SELECT * FROM featured";
     $stmt = $connect->prepare($sql);
     $stmt->execute();
     $items = $stmt->fetchAll(); 
    
     echo "<dic class='root'>";
      echo "<h4><strong>Featured </strong> Pet</h4>";
      echo "<table><tr>";
     foreach($items as $item){
         $sql2 = "SELECT * FROM pet WHERE id ='" . $item['id'] . "'";
         $stmt2 = $connect->prepare($sql2);
         $stmt2->execute();
         $i = $stmt2->fetch(PDO::FETCH_ASSOC);
         
          echo "<td><img src='" .$i['img'] . "'></td>";
     }
     echo "</tr>";
     $c =0;
     echo "<tr>";
    foreach($items as $item){
         $sql2 = "SELECT * FROM pet WHERE id ='" . $item['id'] . "'";
         $stmt2 = $connect->prepare($sql2);
         $stmt2->execute();
         $i = $stmt2->fetch(PDO::FETCH_ASSOC);
         $itemOwner = $i['owner'];
          echo "<form method = 'post'>";
                 if($page == "admin"){
                     echo "<td><button class='btn-success' id='addbutton$c' value=$id onclick='featured(this)' >Add To Featured</button></td>";
                     echo "<td><button class='btn-warning' id='button$c' value=$id onclick='deleteMe(this)' >Delete Entry</button></td>";
                 }
                 else{
                     echo "<td><button class='btn-success' id='button$c' value=$itemOwner onclick='clickMe(this)'/>Contact Owner</button></td>";
                }
                echo "</form>";
     }
     
       echo "</tr></table></div>";
}

?>