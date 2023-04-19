
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
  let table = document.getElementById("cars");
  tr = table.getElementsByTagName("tr");
  for (let i = 0; i < tr.length; i++) {
    let name = tr[i].getElementsByTagName("td")[0].children[0].children[2];
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