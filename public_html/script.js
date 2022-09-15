function code(string)
{
    let firstPart = string.slice(0, string.length / 2);
    let secondPart = string.slice(string.length / 2);
    let newStr = "";
    // alert(firstPart);
    // alert(secondPart);
    // alert(string.length / 2);
    for (let i = 0; i < string.length / 2; i++)
    {
        if (firstPart[i] != undefined)
        {
            newStr += firstPart[i];
        }
        newStr += secondPart[i];
        
    }
    return newStr;
}

function decode(string)
{
    let firstPart = '';
    let secondPart ='';
    let count = string.length;
    if (count % 2 != 0) {
        for (let i = 0; i < count; i++)
        {
              secondPart += string[i];
        }

    }else if(i % 2 != 0){
        for (let i = 0; i < count; i++)
        {
              secondPart += string[i];
        }

    }
     return firstPart + secondPart;

}
