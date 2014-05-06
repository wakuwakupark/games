#pragma strict

var anim : Animator;
var energy : float;
var score : float;
var targetGuiText : GUIText;
var mater : GameObject;
var status : int;
var count : int;

function Start () {
	anim = GetComponent(Animator);
	Reset();
}

function Reset() {
	score = 0.0;
	energy = 0.0;
	status = 0;
	count = 0;
	targetGuiText.text = "Charging";
	transform.position.y = -2.5;
}

function StartFlying (){
	Debug.Log("StartFlying");
	anim.SetBool("Stopping",false);
	targetGuiText.text = "Flying";
	status = 1;
}

function Move() {

	if(energy <= 0){
		return false;
	}
	
	var damage : float;
	damage = Random.value / 10.0;
	
	energy -= damage;
	transform.position.y += 0.01;
	score += 0.01;
	
	mater.transform.localScale.y -= damage/5.0;
	mater.transform.position.y -= damage/10;
	
	return true;
}

function Charging() { 
	
	if(mater.transform.localScale.y >= 5)
		return false;
	
	mater.transform.localScale.y += 0.1;
	mater.transform.position.y += 0.05;
	energy += 0.5;
	
	return true;
}

function ReduceEnergy(){
	if(count != 5){
		count ++;
		return;
	}
	count = 0;

	if(mater.transform.localScale.y <= 0.1)
		return;
	
	mater.transform.localScale.y -= 0.02;
	mater.transform.position.y -= 0.01;
	energy -= 0.1;
	
	return true;
}

function EndFlying() {
	Debug.Log("Score: " + score);
	anim.SetBool("Stopping",true);
	
	//  output score
	targetGuiText.text = "Score: " + (score*1000000) + "m";
	
	status = 2;
}

function GameOver() {
	targetGuiText.text = "Game Over";
	status = 2;
}

function Update () {
	
	switch(status){
		case 0:
			// charging
			
			if(Input.GetMouseButtonDown(0)){
			//if(Input.GetTouch(0).phase == TouchPhase.Began){
				//tap
				if(!Charging())
					GameOver();
			}else if(Input.GetButtonDown("Jump")){
			//if(Input.GetTouch(0).phase == TouchPhase.Moved){
				//swipe
				StartFlying();
			}
			
			ReduceEnergy();			
			break;
		case 1:
			//flying
			if(!Move()){
				EndFlying();
			}
			break;
		case 2:
			//after game
			if(Input.GetMouseButtonDown(0)){
				Reset();
			}
			
			break;
	}

}


