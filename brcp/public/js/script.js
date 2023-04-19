
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";  
  document.getElementById("main-content").style.marginLeft = "250px";
  document.getElementById("main").style.display="none";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";  
  document.getElementById("main").style.display="block";  
}

function search() {
  let input = document.getElementById("myInput");
  let filter = input.value.toUpperCase();
  let divCard = document.getElementById("cars");
  tr = divCard.getElementsByTagName("tr");
  for (let i = 0; i < tr.length; i++) {
    let name = tr[i].getElementsByTagName("td")[0].children[0].children[1];
    let artist = tr[i].getElementsByTagName("td")[1].children[0].children[0];
    if (name || artist) {
      txtValue = (name.textContent || name.innerText);
      d = (artist.textContent || artist.innerText)
      if (txtValue.toUpperCase().indexOf(filter) > -1 || d.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
    // if (artist) {
    //   txtValue = artist.textContent || artist.innerText;
    //   if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //     tr[i].style.display = ""
    //   } else {
    //     tr[i].style.display = "none";
    //   }
    // }

  }
}


// function searchCards() {
//   var input = document.getElementById("search-box").value.toLowerCase();
//   var cards = document.querySelectorAll("#cars .card");

//   for (var i = 0; i < cards.length; i++) {
//     var brandName = cards[i].querySelector('.card-body h3').textContent.toLowerCase();
//     var modelName = cards[i].querySelector('.card-body h6:first-of-type').textContent.toLowerCase();
    
//     if (brandName.indexOf(input) > -1 || modelName.indexOf(input) > -1) {
//       cards[i].style.display = "";
//     } else {
//       cards[i].style.display = "none";
//     }
//   }
// if (brandName.indexOf(input) > -1 || modelName.indexOf(input) > -1) {
//         cards[i].classList.remove("d-none");
//         cards[i].classList.add("d-flex");
//         cards[i].classList.add("flex-column");
//         cards[i].classList.add("selected");
// } else {
//         cards[i].classList.add("d-none");
//         cards[i].classList.remove("d-flex");
//         cards[i].classList.remove("flex-column");
//         cards[i].classList.remove("selected");
// }

// }


