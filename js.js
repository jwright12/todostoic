// HTML elements & containers
const task_body = document.getElementById('task_body')
const title = document.getElementById('title')
const completed_task_header = document.getElementById('completed-task-header')
const completed_task_body = document.getElementById('completed-task-body')
const arrow = document.getElementById('arrow')
const checkbox_complete_submit = document.getElementById('complete-task-form')

const quotes = ['“Waste no more time arguing what a good man should be. Be One.” – Marcus Aurelius', '“To be even minded is the greatest virtue.” — Heraclitus',
'“Be tolerant with others and strict with yourself.” – Marcus Aurelius', '“If a man knows not which port he sails, no wind is favorable.” – Seneca',
'“No person has the power to have everything they want, but it is in their power not to want what they don’t have, and to cheerfully put to good use what they do have.” – Seneca',
'"For to win one hundred victories in one hundred battles is not the acme of skill. To subdue the enemy without fighting is the acme of skill." - Sun Tzu', 
'"Life is really simple, but we insist on making it complicated." - Confucius', '"A superior man is modest in his speech, but exceeds in his actions." - Confucius',
'"If you think in terms of a year, plant a seed; if in terms of ten years, plant trees; if in terms of 100 years, teach the people." - Confucius', '“How long are you going to wait before you demand the best for yourself?” – Epictetus',
'“Curb your desire—don’t set your heart on so many things and you will get what you need.” – Epictetus', '“Don’t explain your philosophy. Embody it.”- Epictetus',
'“What man actually needs is not a tensionless state but rather the striving and struggling for some goal worthy of him.” – Viktor Frankl', '“When we are no longer able to change a situation, we are challenged to change ourselves.” – Viktor Frankl',
'“We are more often frightened than hurt; and we suffer more in imagination than in reality.” – Seneca', '“Nothing, to my way of thinking, is a better proof of a well ordered mind than a man’s ability to stop just where he is and pass some time in his own company.” – Seneca',
'“He who fears death will never do anything worth of a man who is alive.” – Seneca', '"Knowing is not enough; we must apply. Willing is not enough; we must do." - Johann Wolfgang von Goethe',
'"Many people take no care of their money till they come nearly to the end of it, and others do just the same with their time." - Johann Wolfgang von Goethe'
]

// Detect click in task body, if the click target is a checkbox, and is the checkbox we clicked, change its completion status in local storage and remove it from the task body
task_body.addEventListener('click', e => {
    if (e.target.tagName.toLowerCase() === 'input') {
        setTimeout(function () {}, 400)
        checkbox_complete_submit.submit()
    }
})

function Deleteqry(id) {
    if(confirm("Are you sure you want to delete this row?")==true)
             window.location="dashboard.php?del="+id;
      return false;
  }

// Detect click in compelted task body, change its completion status, re-render the screen 
completed_task_body.addEventListener('click', e => {
    if (e.target.tagName.toLowerCase() === 'input') {
        setTimeout(function () {}, 400)
        e.target.parentNode.parentNode.submit()
    }
})

function renderQuotes() {
    let quote = quotes[Math.floor(Math.random() * quotes.length)]
    title.innerText = quote
    
}

// Show an animation of completed task body height
completed_task_header.addEventListener('click', e => {
    if (completed_task_body.clientHeight == 0 ) {
        completed_task_body.classList.add('is-visible')
        completed_task_body.scrollHeight ='1'
        arrow.style.rotate = '-180deg'
    } else {
        completed_task_body.classList.remove('is-visible')
        completed_task_body.scrollHeight = '0'
        arrow.style.rotate = '0deg'
    }
})

renderQuotes()