
// selecting all the edit buttons and saving them in one variable
let editbtn = document.querySelectorAll(".btnedit");
var Id = document.getElementById('person_id');
var Name = document.getElementById('person_name');
var Place = document.getElementById('place_name');
var Deposit = document.getElementById('amount_deposited');

Id.setAttribute("readonly", "");

// adding 'for' loop to add event listener to each and every button selected above
for (let i = 0; i < editbtn.length; i++) {
    editbtn[i].addEventListener('click', function (e) {
        
        // declaring variables to select all TD values and storing them
        let id = 0;
        const td = document.querySelectorAll("TD");
        let textValues = [];

        // 'for-of' loop to add all value into a variable x
            for (const x of td) {
                
                // checking the id of the target btn and saving values related to it into an array
                if(x.dataset.id == e.target.dataset.id){
                    textValues[id++] = x.textContent;
                }
            }            

            // getiing the values stored in the arrays back into the value feild of the input boxes
            Id.value = textValues[0]
            Name.value = textValues[1]
            Place.value = textValues[2]
            Deposit.value = textValues[3]
    });
}
