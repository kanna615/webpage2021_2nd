<?php 
function Harvest_color(){
?>

<tr>
<td align="center"><?=htmlspecialchars($row['member'])?></td>
<td align="center"><?=htmlspecialchars($row['work_time'])?></td>
<td align="center"><?=htmlspecialchars($row['work'])?></td>
<?php
if($row['eff']>80 && $row['work']=="収穫"){?>
    <td align="center" bgcolor="#7cfc00"><b><?=htmlspecialchars($row['eff'])?></b></td>
<?php
}elseif($row['eff']>50 && $row['work']=="収穫"){
?>
    <td align="center" bgcolor="#00bfff"><b><?=htmlspecialchars($row['eff'])?></b></td>
<?php
}elseif($row['eff']>30 && $row['work']=="収穫"){
?>
    <td align="center" bgcolor="#ffd700"><b><?=htmlspecialchars($row['eff'])?></b></td>
<?php
}elseif($row['eff']<30 && $row['work']=="収穫" && $row['eff']!=""){
?>
    <td align="center" bgcolor="#ff4500"><b><?=htmlspecialchars($row['eff'])?></b></td>
<?php
}else{
?>
    <td align="center"><?=htmlspecialchars($row['eff'])?></td>
<?php
}
?>
<td align="center"><?=htmlspecialchars($row['bx'])?></td>
<td align="center"><?=htmlspecialchars($row['rane'])?></td>
<td align="center"><?=htmlspecialchars($row['d_ymd'])?></td>
<td align="center"><?=htmlspecialchars($row['dt'])?></td>
</tr>

<?php
}
?>

<!-- ******************************************************************************************************: -->

<?php 
function Harvest_color($row_){
    echo "<tr>";
    echo '<td align="center">';
    echo "{$row_['member']}";
    echo "</td>";
    echo '<td align="center">';
    echo "{$row_['work_time']}";
    echo "</td>";
    echo '<td align="center">';
    echo "{$row_['work']}";
    echo "</td>";
    
    if($row_['eff']>80 && $row_['work']=="収穫"){
        echo '<td align="center" bgcolor="#7cfc00">';
        echo "<b>";
        echo "{$row_['eff']}";
        echo "</b>";
        echo "</td>";
    
    }elseif($row_['eff']>50 && $row_['work']=="収穫"){
    
        echo '<td align="center" bgcolor="#00bfff">';
        echo "<b>";
        echo "{$row_['eff']}";
        echo "</b>";
        echo "</td>";
    
    }elseif($row_['eff']>30 && $row_['work']=="収穫"){
    
        echo '<td align="center" bgcolor="#ffd700">';
        echo "<b>";
        echo "{$row_['eff']}";
        echo "</b>";
        echo "</td>";
    
    }elseif($row_['eff']<30 && $row_['work']=="収穫" && $row_['eff']!=""){
    
        echo '<td align="center" bgcolor="#ff4500">';
        echo "<b>";
        echo "{$row_['eff']}";
        echo "</b>";
        echo "</td>";
    
    }else{
    
        echo '<td align="center">';
        echo "{$row_['eff']}";
        echo "</td>";
    
    }
    
    echo '<td align="center">';
    echo "{$row_['bx']}";
    echo "</td>";
    echo '<td align="center">';
    echo "{$row_['rane']}";
    echo "</td>";
    echo '<td align="center">';
    echo "{$row_['d_ymd']}";
    echo "</td>";
    echo '<td align="center">';
    echo "{$row_['dt']}";
    echo "</td>";
    echo "</tr>";


}
?>

<!-- ******************************************************************************************************: -->
