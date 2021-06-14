var suggestions = []; //2d array
$.getJSON('usersSearch.php', function(data){
    suggestions = data;
})

//  suggestions = [
//     "how to start google",
//     "how to start gmail",
//     "how to start discord",
//     "how to start steam",
//     "how to start pubg",
//     "how to start whatsapp",
//     "how to start youtube",
//     "aaaaa",
//     "bbbbb",
// ];
