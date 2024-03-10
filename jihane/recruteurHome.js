const addSkill = document.getElementById('add-skill');


const skillTab = [];

addSkill.addEventListener('click', function () {
    for (let i = 0; i < 4; i++) {
        skillTab[i] = document.getElementById(`skill${i + 1}`);
        let computedStyle = window.getComputedStyle(skillTab[i]);
        if (computedStyle.display === 'none') {
            skillTab[i].style.display = 'block';
            return;
        }
    }
});