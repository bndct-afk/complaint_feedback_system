function validateComplaintForm(){

    let title =
        document.forms["complaintForm"]["title"].value;

    let description =
        document.forms["complaintForm"]["description"].value;

    if(title.trim() == ""){

        alert("Complaint title is required.");
        return false;

    }

    if(description.trim() == ""){

        alert("Description is required.");
        return false;

    }

    return true;
}