

let toggleDetails = (e) =>{
    idOfElementToShow =  e.target.getAttribute("value") ;
    console.log(idOfElementToShow);
    let detailsContainer = document.getElementById(idOfElementToShow.toString());
    if(detailsContainer.classList.contains("not-displayed")){
        detailsContainer.classList.remove("not-displayed");
        e.target.innerText = "Hide Details";
    }
    else{
        detailsContainer.classList.add("not-displayed");
        e.target.innerText = "Show Details";
    }
}

const showDetailsParagraphs = document.getElementsByClassName("cart-show-details");
for(let i=0; i< showDetailsParagraphs.length; ++i){
    showDetailsParagraphs[i].addEventListener('click', toggleDetails);
}