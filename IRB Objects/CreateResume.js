//on resume form submit
var tempResume = createResume(document.getElementById(resumeTitle));
//on section submit
var tempSection = createSection(document.getElementById(sectionTitle));
//on subsection submit
var tempSubSection = createSubSection(document.getElementById(subSectionTitle), document.getElementById(startDate), document.getElementById(endDate), document.getElementById(description));
tempSetion.push(tempSubSection);
tempResume.sections.push(tempSection);
