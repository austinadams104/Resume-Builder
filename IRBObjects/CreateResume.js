var resume;
var section;
var subsection;
generateResume();
function generateResume(){
    resume = createResume();
    document.getElementById('AddResumeTitle').setAttribute('style', 'display: inline');
}
function generateSection(){
    section = createSection();
    document.getElementById('AddSectionTitle').setAttribute('style', 'display: inline');
    document.getElementById('SectionTitle').setAttribute('style', 'display: inline');
}
function generateSubsection(){
    subsection = createSubsection();
    document.getElementById('Subsection').setAttribute('style', 'display: inline');
    document.getElementById('AddSubsection').setAttribute('style', 'display: inline');
}
function addResumeTitle(){
    var x = document.getElementById("ResumeTitle");
    resume.title = x.elements[0].value;
    document.getElementById('CreateSection').setAttribute('style', 'display: inline');
}
function addSectionTitle(){
    var x = document.getElementById("SectionTitle");
    section.title = x.elements[0].value;
    document.getElementById('CreateSubsection').setAttribute('style', 'display: inline');
}
function addSubsection(){
    var x = document.getElementById("Subsection");
    subsection.title = x.elements[0].value;
    subsection.startDate = x.elements[1].value;
    subsection.endDate = x.elements[2].value;
    subsection.description = x.elements[3].value;
    document.getElementById('FinishedSubsection').setAttribute('style', 'display: inline');
}
function finishedSubsection(){
    section.subsections.push(subsection);
    document.getElementById("Subsection").reset();
    document.getElementById('FinishedSection').setAttribute('style', 'display: inline');
    document.getElementById('Subsection').setAttribute('style', 'display: none');
    document.getElementById('AddSubsection').setAttribute('style', 'display: none');
    document.getElementById('FinishedSubsection').setAttribute('style', 'display: none');
}
function finishedSection(){
    resume.sections.push(section);
    document.getElementById("SectionTitle").reset();
    document.getElementById('FinishedResume').setAttribute('style', 'display: inline');
    document.getElementById('AddSectionTitle').setAttribute('style', 'display: none');
    document.getElementById('SectionTitle').setAttribute('style', 'display: none');
    document.getElementById('FinishedSection').setAttribute('style', 'display: none');
}
function finishedResume(){
    previewResume();
    var resJSON = JSON.stringify(resume);
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //document.getElementById("txtHint").innerHTML = this.responseText;
                console.log("Success. Hopefully");
            }
        };
        xmlhttp.open('GET', '../resumes/writefiles.php?resumename=' + resume.title + 'json=' + resJSON, true);
        xmlhttp.send();
}
function previewResume(){
    document.getElementById("Preview").innerHTML = "<p><div style=\"text-align: center\">" + "<strong>" + resume.title + "</strong>" + "<br>" + "<br>" + "<br>" + "</div></p>";
    for (var i = 0; i < resume.sections.length; ++i){
        document.getElementById("Preview").innerHTML += "<p>" + "<strong>" + resume.sections[i].title + "</strong>" + "<br><br>" + "</p>";
        for (var j = 0; j < resume.sections[i].subsections.length; ++j){
            document.getElementById("Preview").innerHTML += "<p><div><div>" + "<strong>" + resume.sections[i].subsections[j].title + "</strong>"
            + "<div style=\"float: right\">" + resume.sections[i].subsections[j].startDate + "-" + resume.sections[i].subsections[j].endDate + "</div></div>" + "<br><div>"
            + resume.sections[i].subsections[j].description + "</div>" + "</div></p>";
        }
    }
}
