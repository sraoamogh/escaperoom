var hasKey = false;
var knob = "locked";
var lock = "locked";
function keyPickUp(){
    console.log("the key has been picked up");
    hasKey = true;
    alert("The would look good in your pocket, but it looks better in the lock");
    document.getElementById("key").style.display = "none";
}

function tryDoor(){
    console.log("you clicked the door");
}
function tryLock(){
    console.log("you clicked the Lock");
    var comboTry = prompt("Hold the lock, trust your instincts and riddle me this: What has a head and a tail, but no body or legs?");
    if (comboTry == "coin"){
        lock = "unlocked";
        alert("Pull it out and it opens now dump it on the floor");
        check()
    } else {
        alert("You tried pulling but it still is locked??");
    }
}
function tryTable() {
    console.log("you clicked the computer");
    var puzzleWindow = window.open("puzzle.html", "_blank");
    puzzleWindow.addEventListener('unload', function () {
        document.getElementById("key").style.visibility = "visible";
    });
}

function tryKnob(){
    console.log("hasKey:"+ hasKey);
    if (hasKey == true){
        knob = "unlocked";
        alert("Feel the pins move up and down, and then turn the key either to the left or the right, and the knob now can turn.....");
        check()
    } else{
        alert("What's the rush, look around a little or should i say click around a little?");
    }
}
function check(){
    if(knob == "unlocked"){
        if (lock == "unlocked"){
            document.getElementById("escape").style.visibility = "visible";
        }
        else{
            alert("You tried to leave, but the combination lock is still locked");
        }
    }
    else{
        alert("you tried the knob, still locked");
    }
}
