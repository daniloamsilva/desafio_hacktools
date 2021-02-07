window.onload = () => {
    
  let number_questions = 1;

  const first_input_question = document.getElementById('question_1');
  const question_container = document.getElementById('question_container');

  const delete_question_button = document.createElement('button');
  delete_question_button.classList.add("btn", "btn-outline-danger");
  delete_question_button.setAttribute("type", "button");
  delete_question_button.innerHTML = "<i class='fas fa-trash-alt'></i>";

  document.getElementById('new_question_button').addEventListener('click', () => addQuestionInput(number_questions + 1));

  function addQuestionInput(sequence) {
    const new_input_question = first_input_question.cloneNode(true);
    const new_delete_question_button = delete_question_button.cloneNode(true);

    new_delete_question_button.addEventListener('click', (e) => new_input_question.remove());
    new_input_question.id = 'question_' + sequence;
    new_input_question.getElementsByTagName('input')[0].value = "";

    new_input_question.appendChild(new_delete_question_button);
    question_container.appendChild(new_input_question);

    number_questions++;
  }

}