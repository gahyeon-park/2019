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
//수량,가격변동
	var num = 1;
    var changePrice = function(number)
    {
        var priceArray = [];
        var priceString = '';
        var price = document.getElementById("price");
		var numberQuantity = document.getElementById("numberQuantity");

		if(number == 0 && num >0)
		{
			num--;
		}
		if(number==1 && num<50)
		{
			num++;
		}

        priceString = String(num*1500);
        price.innerHTML = numberPrint(priceString)+"원";
		numberQuantity.innerHTML = num;
    }
    var numberPrint = function(array)
	{
        var numberString = array;
		var numberArray = [];
		var result = '';
		var numLength = numberString.length;
		var j=0;

		for(var i=0; i<numLength; i++)
		{
			if(i % 4 ==3)
			{
				numberArray.push(',');
				numLength += 1;
				j++;
			}
			else
			{
				numberArray.push(numberString[numberString.length-(i-j+1)]);
			}
		}
		for(var i=0; i<numberArray.length; i++)
		{
			result += numberArray[numberArray.length-(i+1)];
		}
		return result;
	}