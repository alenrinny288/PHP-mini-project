<html>
    <head>
        <title>My php project</title>
        <link rel="stylesheet" href="chat.css">
    </head>

<body>
<form method='POST' action=' '>
    <div class="topbarcls" id="topbar">
    <div id="name"><h1 id='headingtext'>Student's Bot</h1></div>

    <div id="flexend">
    <div id="chat" onclick="location.href='home1.php'">Home</div>
      <div id="chat" onclick="location.href='chat.php'">Chat</div>
      <div id="chat" onclick="location.href='contact.php'">Contact</div>
    </div>  

    </div>

    <div id="underline1"></div>

      <div id="bodywrap" >
        <div id="chatcolumn">
          <div id="answercolumn" >
          <?php
if(isset($_POST['search']))
{
$flag=0;
$con=mysqli_connect("localhost","root","","data1");
if(!$con)
die("Connection failed".mysqli_connect_error());
$arr1=explode(" ",$_POST['qu']);
$q="select Sname from table1";
$query=mysqli_query($con,$q);
$result=mysqli_query($con,$q);
$name="select";
if(mysqli_num_rows($result)>0)
{
while($row=mysqli_fetch_assoc($result))
{
for($i=0;$i<count($arr1);$i++)
{
  if(strcmp($arr1[$i],$row['Sname'])==0)
  {
    $name=$row['Sname'];
     $flag=1;
     break;
  }
}
if($flag==1)
break;
}
}
$flag2=1;
if($flag==1)
{
  for($i=0;$i<count($arr1);$i++)
{
  if(strcmp($arr1[$i],"details")==0)
  {
    $flag2=0;
    $sq="select * from table1 where Sname='".$name."'";
    $result=mysqli_query($con,$sq);
    $result2 = mysqli_fetch_assoc($result);
    echo "ID :" .$result2['SID'];
    echo "<br>Name :".$result2['Sname'];
    echo "<br>Class :" .$result2['Sclass'];
    break;
  }
  else if(strcmp($arr1[$i],"id")==0)
  {
    $flag2=0;
    $sq="select SID from table1 where Sname='".$name."'";
    $result=mysqli_query($con,$sq);
    echo " ".mysqli_fetch_assoc($result)['SID'];
    break;
  }
  else if(strcmp($arr1[$i],"class")==0)
  {
    $flag2=0;
    $sq="select Sclass from table1 where Sname='".$name."'";
    $result=mysqli_query($con,$sq);
    echo " ".mysqli_fetch_assoc($result)['Sclass'];
    break;
  }
  else
  {
  $flag2=1;
  }
  }
}
if($flag2==1)
{
echo "Invalid data input";
}
mysqli_close($con);
}
?>
          </div>
          
          <div id="questioncolumn">
             <?php
             $arr= " ";
             if(isset($_POST['search']))
             {
            $arr= $_POST['qu'];
            echo " ".$arr;
             }

          ?>
          </div>
           <input type="text" id="chatbox" name="qu"/> 
             <button id="sendbtn" name="search"><img src="icons/send.png" height="70px" width="70px" style="align-self: center"></button>
        </div>
    
      </div> 
</form>
</body>
</html>




