#pragma strict

function Start () {

}

function Update () {
	if (Input.GetMouseButtonDown(0)) {
	    var tapPoint : Vector2 = Camera.main.ScreenToWorldPoint(Input.mousePosition);
	    var collition2d : Collider2D = Physics2D.OverlapPoint(tapPoint);
	    if (collition2d) {
	        var hitObject : RaycastHit2D = Physics2D.Raycast(tapPoint,-Vector2.up);
	        if (hitObject) {
	            Debug.Log("hit object is " + hitObject.collider.gameObject.name);
	            Application.LoadLevel("Play");
	        }
	    }
	}
}