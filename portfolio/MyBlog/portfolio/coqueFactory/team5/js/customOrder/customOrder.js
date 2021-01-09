function dropMenu() {
	var bottomNav = document.getElementById("bottomMenuImg");
	var subMenu = document.getElementsByClassName("subMenu");

	bottomNav.style.backgroundImage = 'url("../../images/bottomNavBackground2.png")';

	for(i = 0; i<subMenu.length; i++) {
		subMenu[i].style.display = "block";
	}
	
	
}
function undropMenu() {
	var bottomNav = document.getElementById("bottomMenuImg");
	var subMenu = document.getElementsByClassName("subMenu");

	bottomNav.style.backgroundImage = 'url("../../images/bottomNavBackground.png")';

	for(i = 0; i<subMenu.length; i++) {
		subMenu[i].style.display = "none";
	}
}

// 로그인 클릭 팝업 띄우기
function popUpLogin() {
	var loginBox = document.getElementById("loginBox");
	var popUpBackground = document.getElementById("popUpBackground");
	loginBox.style.display = "block";
	popUpBackground.style.display = "block";
}
function exitPopUp() {
	var loginPopUp_cancelButton = document.getElementById("loginPopUp_cancelButton");
	var signUpBox = document.getElementById("signUpBox");
	
	loginBox.style.display = "none";
	signUpBox.style.display = "none";
	popUpBackground.style.display = "none";
}
function popUpFind() {
	var findIdPwBaseBox = document.getElementById("findIdPwBaseBox");
	var popUpBackground = document.getElementById("popUpBackground");
	findIdPwBaseBox.style.display = "block";
	popUpBackground.style.display = "block";
}

function popUpSignUp() {
	var signUpBox = document.getElementById("signUpBox");
	var popUpBackground = document.getElementById("popUpBackground");
	signUpBox.style.display = "block";
	popUpBackground.style.display = "block";
}
function forgotIdPwClickHere(){
	exitPopUp();
	popUpFind();
	
} 






//색상 변경
function setColor(color, direct){
	if(direct == 'left'){
		document.getElementById('leftCoque').style.backgroundColor = color;
		document.getElementById('leftCoqueColor').value = color;
	}else if(direct == 'right'){
		document.getElementById('rightCoque').style.backgroundColor = color;
		document.getElementById('rightCoqueColor').value = color;
	}
}

//수량 카운트 증가
function chgCount(type){
	var cnt = document.getElementById('quantity').innerHTML;
	if(type == 'plus'){	//수량 증가
		cnt++;
		document.getElementById('quantity').innerHTML = cnt;
	}else if(type == 'minus'){	//수량 감소
		if(cnt != 1){
			cnt--;
			document.getElementById('quantity').innerHTML = cnt;
		}
	}
}


//추가하기
function addBasket(){
	

	//왼쪽 색상
	var leftColor = document.getElementById('leftCoqueColor').value;
	//오른쪽 색상
	var rightColor = document.getElementById('rightCoqueColor').value;
	
	//왼쪽 마카롱 색상을 선택하지 않았을 경우 return
   if(leftColor == null || leftColor == ''){
      alert('왼쪽 마카롱 색상이 선택되지 않았습니다.');
      return;
   }
   //오른쪽 마카롱 색상을 선택하지 않았을 경우 return
   if(rightColor == null || rightColor == ''){
      alert('오른쪽 마카롱 색상이 선택되지 않았습니다.');
      return;
   }

	//선택된 필링 정보
	var selectedFilling = document.getElementById('selectedFilling').value;
	//선택된 토핑 정보
    var selectedTopping = document.getElementById('selectedTopping').value;

	//필링 선택 되었는지 확인
	if(selectedFilling == null || selectedFilling == ''){
      alert('필링이 선택되지 않았습니다.');
      return;
   }

   //토핑 선택 되었는지 확인
   if(selectedTopping == null || selectedTopping == ''){
      alert('토핑이 선택되지 않았습니다.');
      return;
   }
	//수량
	var cnt = document.getElementById('quantity').innerHTML;
	//가격
	var price = 3000 * cnt; 
	//토핑가격추가
	if(selectedTopping == 'cereal' || selectedTopping == 'wahase' || selectedTopping == 'frazzle'){
		price += 200 * cnt;
	}else if(selectedTopping == 'greengrape' || selectedTopping == 'strawberry'){
		price += 500 * cnt;
	}

	//필링 선택에 맞게 클래스명 추가
	var fillingClassName = '';
	if(selectedFilling == 'choko'){
		fillingClassName = 'tPChokoSmall';
	}else if(selectedFilling == 'greentea'){
		fillingClassName = 'tPGreenteaSmall';
	}else if(selectedFilling == 'vanilla'){
		fillingClassName = 'tPVanillaSmall';
	}else if(selectedFilling == 'mint'){
		fillingClassName = 'tPMintSmall';
	}else if(selectedFilling == 'oreo'){
		fillingClassName = 'tPOreoSmall';
	}
	
	//토핑 선택에 맞게 보여줄 이름 변경
	var toppingName = '';
	if(selectedTopping == 'cereal'){
		toppingName = '시리얼';
	}else if(selectedTopping == 'greengrape'){
		toppingName = '청포도';
	}else if(selectedTopping == 'strawberry'){
		toppingName = '딸기';
	}else if(selectedTopping == 'wahase'){
		toppingName = '웨하스';
	}else if(selectedTopping == 'frazzle'){
		toppingName = '프레즐';
	}

	//추가해줄 HTML
	var html = '';
	html +=	'	<div class="putOrderImageBox">';
	html +=	'		<button class="rescissionBtn" onclick="delBasket(this);"></button>';
	html += '		<div class="putLeftCoque" id="putLeftCoque" style="background-color:'+leftColor+';">왼쪽꼬끄</div>';
	html += '		<div class="putFilling '+fillingClassName+'">필링</div>';
	html += '		<div class="putRightCoque" id="putRightCoque" style="background-color:'+rightColor+';">오른쪽꼬끄</div>	';
	html += '		<p><span class="resultPrice">'+price+'</span>원 | <span>'+cnt+'</span>개<br>토핑 | <span>'+toppingName+'</span></p>	';
	html += '	</div>';
	
	//비어있는 영역이 하나 이상이라면 첫번재 비어있는 곳에 추가한다
	var empty = document.getElementsByClassName('empty');
	if(empty.length > 0){
		empty[0].innerHTML = html;
		//클래스명을 비워준다
		empty[0].className = '';
		//총 계산을 다시 한다
		var priceArray = document.getElementsByClassName('resultPrice');
		var price = 0;
		//배열에 담긴 전체 가격정보를 더한다
		for(var i=0; i<priceArray.length; i++){
			price += parseInt(priceArray[i].innerHTML);
		}
		//합산을 표시한다
		var sum = resultValue(price);
		document.getElementById('sumPrice').innerHTML = sum;
	}
}

//삭제하기
function delBasket(btn){
	//부모 li를 찾아서 비워주고 클래스명을 붙여준다
	var li = btn.parentNode.parentNode;
	li.innerHTML = '';
	li.className = 'empty';

	//총 계산을 다시 한다
	var priceArray = document.getElementsByClassName('resultPrice');
	var price = 0;
	//배열에 담긴 전체 가격정보를 더한다
	for(var i=0; i<priceArray.length; i++){
		price += parseInt(priceArray[i].innerHTML);
	}
	//합산을 표시한다
	var sum = resultValue(price);
	document.getElementById('sumPrice').innerHTML = sum;
}

//필링 선택
function selectFilling(li){
	//하나도 선택 되지 않은 상태로 초기화
	var choko = document.getElementById('choko');
	choko.className = 'choko';
	var greentea = document.getElementById('greentea');
	greentea.className = 'greentea';
	var vanilla = document.getElementById('vanilla');
	vanilla.className = 'vanilla';
	var mint = document.getElementById('mint');
	mint.className = 'mint';
	var oreo = document.getElementById('oreo');
	oreo.className = 'oreo';

	//선택된 클래스명을 변경해준다
	var cls = li.className;
	li.className = cls+'Check';

	//선택된 필링정보를 저장
	document.getElementById('selectedFilling').value = cls;
	
	//큰 마카롱에 필링 이미지 추가(클래스명 변경)
	var fillingCls = 'filling';
	var newClsName = '';
	if(cls == 'choko'){
		newClsName = fillingCls+' tPChoko';
	}else if(cls == 'greentea'){
		newClsName = fillingCls+' tPGreentea';
	}else if(cls == 'vanilla'){
		newClsName = fillingCls+' tPVanilla';
	}else if(cls == 'mint'){
		newClsName = fillingCls+' tPMint';
	}else if(cls == 'oreo'){
		newClsName = fillingCls+' tPOreo';
	}

	document.getElementById('filling').className = newClsName;
}

//토핑 선택
function selectTopping(li){
	//하나도 선택 되지 않은 상태로 초기화
	var cereal = document.getElementById('cereal');
	cereal.className = 'cereal';
	var greengrape = document.getElementById('greengrape');
	greengrape.className = 'greengrape';
	var strawberry = document.getElementById('strawberry');
	strawberry.className = 'strawberry';
	var wahase = document.getElementById('wahase');
	wahase.className = 'wahase';
	var frazzle = document.getElementById('frazzle');
	frazzle.className = 'frazzle';

	//선택된 클래스명을 변경해준다
	var cls = li.className;
	li.className = cls+'Check';

	document.getElementById('selectedTopping').value = cls;
}

//천단위 콤마 찍기
function resultValue(num) {
	var num = num+'';
	var reverseArray="";
	var blankArray="";
	var lastResultArray="";
	
	for(var i = (num.length-1) ; i>=0 ; i=i-1){
		reverseArray+=num[i];	
	}
	
	for(var i = 0 ; i<reverseArray.length ; i++){
		if(i%3==0 && i!=0){
			blankArray+=",";
		}
		blankArray+=reverseArray[i];
	}
	for(var i =(blankArray.length-1) ; i >=0 ; i=i-1){
		lastResultArray+=blankArray[i];
	}
	return lastResultArray;
}