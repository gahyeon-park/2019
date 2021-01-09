
//메인 카테고리 마우스 오버,무브,아웃 했을때 효과
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

// 고객센터 _ 6번 배송안내 클릭시 배송안내 정보창이 출력(display:block) 기능 클릭된 안내상자는 색상이 바뀐다.

function deliveryInformationBoxDisplay() {
	var deliveryinformationBox=document.getElementById("deliveryinformationBox");
	var deliveryQuestionPosition=document.getElementById("deliveryQuestionPosition");
	var deliveryQuestionNumberBox=document.getElementById("deliveryQuestionNumberBox");

	deliveryQuestionPosition.style.backgroundColor="#ffc0c0";
	deliveryQuestionNumberBox.style.backgroundColor="#ff5f5f";
	deliveryinformationBox.style.display="block";
}


// 고객센터 _ 6번 배송안내 _ 첫번째 글 클릭시 슬라이드텍스트 글 출력(display:block) 기능
function downslideBox() {
	var deliveryInforFirstSlide=document.getElementById("deliveryInforFirstSlide");

	deliveryInforFirstSlide.style.display="block";
}