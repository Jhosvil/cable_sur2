//const date = document.getElementById("date");
//const time = document.getElementById("time");

function getCurrentDate(){
  const currentDate = new Date();
  const options = {
    weekday: 'short',
    year: 'numeric',
    month: 'short',
    day: 'numeric'
  };

  //date.innerHTML = currentDate.toLocaleDateString('es', options);
  $("#date").html(currentDate.toLocaleDateString('es', options));
}

function getCurrentTime(){
  const currentDate = new Date();
  const hours = formatTime(currentDate.getHours());
  const minutes = formatTime(currentDate.getMinutes());
  const seconds = formatTime(currentDate.getSeconds());
  const format = (hours < 12) || (hours == 24)? 'AM': 'PM';
  let formatHours = formatTime((hours) %  12);
  formatHours = formatHours < 1? 12: formatHours;

  //time.innerHTML = `${formatHours}:${minutes}:${seconds} <small>${format}</small>`;
  $("#time").html(`${formatHours}:${minutes}:${seconds} <small>${format}</small>`)
}

function formatTime(value){
  return value < 10? `0${value}`: value;
}

getCurrentDate();
setInterval(getCurrentTime, 1000);
