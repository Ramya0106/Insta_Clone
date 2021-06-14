const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = ()=>{
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){ //adding an active class when user starts searching and only run the setInterval ajax if there is no active class
        searchBar.classList.add("active");
    }
    else{
        searchBar.classList.remove("active");
    }
    //start ajax
    let xhr = new XMLHttpRequest(); //creating XML object;
    xhr.open("POST", "php/search.php", true); 
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response; //xhr response gives us response of that passed URL
                usersList.innerHTML = data;

            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm); //sending user search term to php file with ajax
}

setInterval(()=>{
    //lets start ajax
    let xhr = new XMLHttpRequest(); //creating XML object;
    xhr.open("GET", "php/users.php", true); //using get method bcoz we r receiving data
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response; //xhr response gives us response of that passed URL
                if(!searchBar.classList.contains("active")){ //if active active not contains in searchbar then add this data
                    usersList.innerHTML = data;
                }

            }
        }
    }
    xhr.send();
}, 500); //this function will run frequently after 500ms