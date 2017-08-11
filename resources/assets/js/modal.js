var payForm = {
    inputForm: document.getElementById('input_form'),
    name: document.getElementById('receiver_name'),
    accNum: document.getElementById('receiver_account_number'),
    amount: document.getElementById('amount'),
    description: document.getElementById('description')
};


payForm.inputForm.addEventListener(writeToModal);

function writeToModel(){

    document.getElementById('rec_name').innerHTML = payForm.name;
    document.getElementById('rec_acc').innerHTML = payForm.accNum;
    document.getElementById('rec_amount').innerHTML = payForm.accNum;
    document.getElementById('rec_desc').innerHTML = payForm.description;
}