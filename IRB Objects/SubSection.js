function createSubSection(name, start, end, info){
    var SubSection = {
        title: name,
        startDate: start,
        endDate: end,
        description: info
    };
    return SubSection;
}