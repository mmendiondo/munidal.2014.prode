
function today()
{
  return new Date();
}

Date.isLeapYear = function (year) { 
    return (((year % 4 === 0) && (year % 100 !== 0)) || (year % 400 === 0)); 
};

Date.getDaysInMonth = function (year, month) {
    return [31, (Date.isLeapYear(year) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
};

Date.prototype.isLeapYear = function () { 
    var y = this.getFullYear(); 
    return (((y % 4 === 0) && (y % 100 !== 0)) || (y % 400 === 0)); 
};

Date.prototype.getDaysInMonth = function () { 
    return Date.getDaysInMonth(this.getFullYear(), this.getMonth());
};

Date.prototype.addMonths = function (value) {
    var n = this.getDate();
    this.setDate(1);
    this.setMonth(this.getMonth() + value);
    this.setDate(Math.min(n, this.getDaysInMonth()));
    return this;
};

function preventNotNumber(e)
{
   var keyCode = (e.keyCode ? e.keyCode : e.which);
    if(keyCode > 57)
      e.preventDefault();
}

function limitCharacters(elem, number)
{
     if(elem.innerText.length > number)
      elem.innerText = elem.innerText.substring(0, number);
}