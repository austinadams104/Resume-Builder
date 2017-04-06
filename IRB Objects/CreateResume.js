var resume;
var section;
var subsection;
//on create resume click
generateResume();
function generateResume(){    
    resume = createResume();
    //document.getElementById('AddResumeTitle').setAttribute('style', 'display: inline');
    document.getElementById('AddResumeTitle').setAttribute('style', 'display: inline');
}
function generateSection(){
    section = createSection();
    document.getElementById('AddSectionTitle').setAttribute('style', 'display: inline');
}
function generateSubsection(){
    subsection = createSubsection();
    document.getElementById('AddSubsection').setAttribute('style', 'display: inline');    
    document.getElementById('FinishedSubsection').setAttribute('style', 'display: inline');
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
}
function finishedSubsection(){   
    section.subsections.push(subsection);
    document.getElementById("Subsection").reset();
    document.getElementById('FinishedSection').setAttribute('style', 'display: inline');
}
function finishedSection(){    
    resume.sections.push(section);     
    document.getElementById("SectionTitle").reset();
    document.getElementById('FinishedResume').setAttribute('style', 'display: inline');

}
function finishedResume(){
    //add Resume to the database as json object
}
