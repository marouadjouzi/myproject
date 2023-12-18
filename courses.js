const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");
     
    toggle.addEventListener("click", ()=>{
        sidebar.classList.toggle("close");
    });


    modeSwitch.addEventListener("click", ()=>{
        body.classList.toggle("dark");

        if(body.classList.contains("dark")){
            modeText.innerText = "Mode sombre";

        }else{
            modeText.innerText = "Mode clair";
        }
    });


const inputBox = document.getElementById("input-box");
const listContainer = document.getElementById("list-container");

function add() {
    if (inputBox.value === '') {
        alert("Vous devez entrer quelque chose");
    } else {
        let li = document.createElement("li");
        li.innerHTML = inputBox.value;
        listContainer.appendChild(li);
		let span=document.createElement("span");
		span.innerHTML="\u00d7";
		li.appendChild(span);
    }inputBox.value="";
		saveData();
}
listContainer.addEventListener("click",function(e){
if(e.target.tagName==="LI"){
	e.target.classList.toggle("checked");
}
else if(e.target.tagName==="SPAN"){
	e.target.parentElement.remove();
	saveData();
}
},false);
function saveData(){
 localStorage.setItem("data",listContainer.innerHTML);
 }
 function showTask(){
	 listContainer.innerHTML=localStorage.getItem("data");
 }
 showTask();
 
 

const inputBox1 = document.getElementById("input-box1");
const listContainer1 = document.getElementById("list-container1");

function add1() {
    if (inputBox1.value === '') {
        alert("Vous devez entrer quelque chose");
    } else {
        let li = document.createElement("li");
        li.innerHTML = inputBox1.value;
        listContainer1.appendChild(li);
		let span=document.createElement("span");
		span.innerHTML="\u00d7";
		li.appendChild(span);
    }inputBox1.value="";
		saveData1();
}
listContainer1.addEventListener("click",function(e){
if(e.target.tagName==="LI"){
	e.target.classList.toggle("checked");
}
else if(e.target.tagName==="SPAN"){
	e.target.parentElement.remove();
	saveData1();
}
},false);
function saveData1(){
 localStorage.setItem("data",listContainer1.innerHTML);
 }
 function showTask1(){
	 listContainer.innerHTML=localStorage.getItem("data");
 }
 showTask1();
 
 
 
 
 
 
const inputBox2 = document.getElementById("input-box2");
const listContainer2 = document.getElementById("list-container2");

function add2() {
    if (inputBox2.value === '') {
        alert("Vous devez entrer quelque chose");
    } else {
        let li = document.createElement("li");
        li.innerHTML = inputBox2.value;
        listContainer2.appendChild(li);
		let span=document.createElement("span");
		span.innerHTML="\u00d7";
		li.appendChild(span);
    }inputBox2.value="";
		saveData2();
}
listContainer2.addEventListener("click",function(e){
if(e.target.tagName==="LI"){
	e.target.classList.toggle("checked");
}
else if(e.target.tagName==="SPAN"){
	e.target.parentElement.remove();
	saveData2();
}
},false);
function saveData2(){
 localStorage.setItem("data",listContainer2.innerHTML);
 }
 function showTask2(){
	 listContainer.innerHTML=localStorage.getItem("data");
 }
 showTask2();
 
 
 
 
 
 
const inputBox3 = document.getElementById("input-box3");
const listContainer3 = document.getElementById("list-container3");

function add3() {
    if (inputBox3.value === '') {
        alert("Vous devez entrer quelque chose");
    } else {
        let li = document.createElement("li");
        li.innerHTML = inputBox3.value;
        listContainer3.appendChild(li);
		let span=document.createElement("span");
		span.innerHTML="\u00d7";
		li.appendChild(span);
    }inputBox3.value="";
		saveData3();
}
listContainer3.addEventListener("click",function(e){
if(e.target.tagName==="LI"){
	e.target.classList.toggle("checked");
}
else if(e.target.tagName==="SPAN"){
	e.target.parentElement.remove();
	saveData3();
}
},false);
function saveData3(){
 localStorage.setItem("data",listContainer3.innerHTML);
 }
 function showTask3(){
	 listContainer.innerHTML=localStorage.getItem("data");
 }
 showTask3();
 