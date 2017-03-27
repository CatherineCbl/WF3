var choix= parseInt(window.prompt('Choisissez un nombre'));
document.write('<h1>Table des Multiplications</h1>');
document.write('<table>');

for (var i = 1; i <= choix; i++) {
    document.write('<tr>');
    for (var a = 1; a <= choix; a++) {

        var result=a*i;

        if (i==a) {
            document.write('<td class="blue">'+result+'</td>');
        }
        else {
            document.write('<td>'+result+'</td>');
        }
    }
    document.write('</tr>');
}
document.write('</table>');
