<?php
include("./common.php");

function isHoliday($month, $date, $day, $holidayArr) {
    $i = 0;
    while($i < count($holidayArr)) {
        if($month == $holidayArr[$i][0] && $date == $holidayArr[$i][1]) return true;
        if($day == 6 || $day == 0) return true; 
        $i++;
    }
    return false;
}

// isset($_POST['dateObj']) || exit;

$holidayArr = array(
    array('1', '1'),
    array('3', '1'),
    array('5', '5'),
    array('6', '6'),
    array('8', '15'),
    array('10', '3'),
    array('10', '9'),
    array('12', '25'),
    array('9', '12'),
    array('9', '13'),
    array('9', '14'),
    array('2', '4'),
    array('2', '5'),
    array('2', '6'),
    array('4', '8')
);

/* open room database */
openDB($roomConn);
openDB($resConn);

$sql = 'SELECT * FROM `ROOM` LEFT JOIN `ROOM_PRICE` ON `ROOM`.`ROOM_PRICE_ID` = `ROOM_PRICE`.`PRICE_ID`;';
sqlDB($roomConn, $roomResult, $sql) || exit;

$htmlString = '';

$i = 1;
while($roomRow = mysqli_fetch_assoc($roomResult)) {
    $sql = 'SELECT * FROM `RESERVATION` WHERE `RES_ROOM_ID` = "'. $roomRow['ROOM_ID'] . '" AND date_format(`RES_CHECKIN`, "%Y.%m.%d") <= "' . $_POST['dateString'] . '" AND date_format(`RES_CHECKOUT`, "%Y.%m.%d") >= "' . $_POST['dateString'] . '";';
    
    // high middle low set money
    $priceType = setPriceType((int)$_POST['month'], (int)$_POST['date']);

    if($priceType == -1) $moneyNum = setMoneyComma($roomRow['PRICE_LOW']);
    if($priceType == 0) $moneyNum = setMoneyComma($roomRow['PRICE_MIDDLE']);
    if($priceType == 1) $moneyNum = setMoneyComma($roomRow['PRICE_HIGH']);

    if(isHoliday((int)$_POST['month'], (int)$_POST['date'], (int)$_POST['day'], $holidayArr)) $moneyNum = setMoneyComma($roomRow['PRICE_HIGH']);

    $originPrice = removeMoneyComma($moneyNum);

    if(sqlDB($resConn, $resResult, $sql) == 0) {
        $htmlString .= "
    
        
        <tr>
        <td>
        <input id='roomID$i' type='hidden' name='roomID$i' value='{$roomRow['ROOM_ID']}'>
        <input class='checkBox$i checkBox' type='checkbox' name='chechbox$i' value='{$roomRow['ROOM_NAME']}'>
            </td>
            <td><img src='../../images/reservation/num$i.jpg' alt='room_img'></td>
            <td>
                <h4 id='roomName$i'>{$roomRow['ROOM_NAME']}</h4>
                <h5>{$roomRow['ROOM_SIZE']}평</h5>
                <p class='introduce'>
                    <input id='standardNum$i' name='standardNum$i' type='hidden' value='{$roomRow['ROOM_PERSONNEL_MIN']}'>
                    <input id='maxNum$i' name='maxNum$i' type='hidden' value='{$roomRow['ROOM_PERSONNEL_MAX']}'>
                    기준 {$roomRow['ROOM_PERSONNEL_MIN']} / 최대 {$roomRow['ROOM_PERSONNEL_MAX']}<br>
                    <span>&nbsp;{$roomRow['ROOM_FORM']}</span>
                </p>
            </td>
            <td>
                <p class='period'>기간</p>
                <select class='periodInput' id='period$i' name='period$i'>
                    <option value='1'>1박</option>
                    <option value='2'>2박</option>
                    <option value='3'>3박</option>
                    <option value='4'>4박</option>
                    <option value='5'>5박</option>
                </select>
            </td>
            <td>
                <p class='adult'>성인</p>
                <input id='adultNum$i' class='adultInput' type='number' name='adult$i' value='{$roomRow['ROOM_PERSONNEL_MIN']}'>
                <input id='adultOverNum$i' type='hidden' value='0'>
            </td>
            <td>
                <p class='child'>아동</p>
                <input id='childNum$i' class='childInput' type='number' name='child$i' value='0'>
                <input id='childOverNum$i' type='hidden' value='0'>
            </td>
            <td>
                <p class='baby'>유아</p>
                <input id='babyNum$i' class='babyInput' type='number' name='small$i' value='0'>
                <input id='babyOverNum$i' type='hidden' value='0'>
            </td>
            <td>
            <input id='originPrice$i' type='hidden' name='originPrice' value='{$originPrice}'>
            <input id='totalPriceNum$i' type='hidden' name='totalPrice' value='{$originPrice}'>
            <h3 id='totalPrice$i'>{$moneyNum}원</h3>
            </td>
        </tr>";
    }

    $i++;
}
closeDB($resConn, $resResult);
closeDB($roomConn, $roomResult);

echo json_encode(array('isSuccess'=>true, 'roomHTMLString'=>$htmlString, 'dateString'=>$_POST['dateString']));
?>