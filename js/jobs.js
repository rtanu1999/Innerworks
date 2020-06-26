function getDetails(e)
{
    if(e != "" && e != null)
    {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if(xhttp.readyState == 4 && xhttp.status == 200)
            {
                document.getElementById("fieldsByService").innerHTML = xhttp.responseText;
            }
        };
        xhttp.open("POST", "getEmployerFormData.php?service="+e, true);
        xhttp.send();
    }
}

function submitEmployerForm()
{
    var result = document.getElementById("employerFormSubmitResult");

    var companyName = document.getElementById("companyName").value;
    var companyAddress = document.getElementById("companyAddress").value;
    var contactPerson = document.getElementById("contactPerson").value;
    var emailAddress = document.getElementById("emailAddress").value;
    var lookingService = document.getElementById("lookingService").value;

    //Service - 1
    var jobDescription = document.getElementById("jobDescription").value;
    var mySkills = document.getElementById("mySkills").value;
    var experiencedRequired = document.getElementById("experiencedRequired").value;
    var education = document.getElementById("education").value;
    var salary = document.getElementById("salary").value;

    //service - 2
    var keySkills = document.getElementById("keySkills").value;
    var experienceRequired = document.getElementById("experienceRequired").value;
    var currentSalary = document.getElementById("currentSalary").value;
    var expectedSalary = document.getElementById("expectedSalary").value;
    var noticePeriod = document.getElementById("noticePeriod").value;
    var location = document.getElementById("location").value;
    var facility = document.getElementById("facility").value;
    var educationRequired = document.getElementById("educationRequired").value;

    if(companyName != "" && companyName != null)
    {
        if(companyAddress != "" && companyAddress != null)
        {
            if(contactPerson != "" && contactPerson != null)
            {
                if(emailAddress != "" && emailAddress != null)
                {
                    if(lookingService != "" && lookingService != null)
                    {
                        if(lookingService == "1")
                        {
                            if(jobDescription != "" && jobDescription != null )
                            {
                                if(mySkills != "" && mySkills != null )
                                {
                                    if(experiencedRequired != "" && experiencedRequired != null )
                                    {
                                        if(education != "" && education != null )
                                        {
                                            if(salary != "" && salary != null )
                                            {
                                                //Submit Form - RECRUITMENT
                                                var xhttp;
                                                xhttp = new XMLHttpRequest();
                                                xhttp.onreadystatechange = function() {
                                                    if(xhttp.readyState == 4 && xhttp.status == 200)
                                                    {
                                                        document.getElementById("employerFormSubmitResult").innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> '+xhttp.responseText+'</div>';
                                                    }
                                                };
                                                xhttp.open("POST", "recruiterForm.php?companyName="+companyName+"&companyAddress="+companyAddress+"&contactPerson="+contactPerson+"&emailAddress="+emailAddress+"&lookingService="+lookingService+"&jobDescription="+jobDescription+"&mySkills="+mySkills+"&experiencedRequired="+experiencedRequired+"&education="+education+"&salary="+salary, true);
                                                xhttp.send();
                                            }
                                            else
                                            {
                                                result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter salary.</div>';
                                                document.getElementById("salary").focus();
                                            }
                                        }
                                        else
                                        {
                                            result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Your Education.</div>';
                                            document.getElementById("education").focus();
                                        }
                                    }
                                    else
                                    {
                                        result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Your Experience.</div>';
                                        document.getElementById("experiencedRequired").focus();
                                    }
                                }
                                else
                                {
                                    result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Skills.</div>';
                                    document.getElementById("mySkills").focus();
                                }
                            }
                            else
                            {
                                result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Job Description.</div>';
                                document.getElementById("jobDescription").focus();
                            }
                        }
                        else if(lookingService == "2")
                        {
                            //Submit Form - STAFFING
                            if(jobDescription != "" && jobDescription != null)
                            {
                                if(keySkills != "" && keySkills != null)
                                {
                                    if(experienceRequired != "" && experienceRequired != null)
                                    {
                                        if(educationRequired != "" && educationRequired != null)
                                        {
                                            if(currentSalary != "" && currentSalary != null)
                                            {
                                                if(expectedSalary != "" && expectedSalary != null)
                                                {
                                                    if(noticePeriod != "" && noticePeriod != null)
                                                    {
                                                        if(location != "" && location != null)
                                                        {
                                                            if(facility != "" && facility != null)
                                                            {
                                                                var xhttp;
                                                                xhttp = new XMLHttpRequest();
                                                                xhttp.onreadystatechange = function() {
                                                                    if(xhttp.readyState == 4 && xhttp.status == 200)
                                                                    {
                                                                        document.getElementById("employerFormSubmitResult").innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> '+xhttp.responseText+'</div>';
                                                                    }
                                                                };
                                                                xhttp.open("POST", "staffingForm.php?companyName="+companyName+"&companyAddress="+companyAddress+"&contactPerson="+contactPerson+"&emailAddress="+emailAddress+"&lookingService="+lookingService+"&jobDescription="+jobDescription+"&keySkills="+keySkills+"&experienceRequired="+experienceRequired+"&educationRequired="+educationRequired+"&currentSalary="+currentSalary+"&expectedSalary="+expectedSalary+"&noticePeriod="+noticePeriod+"&location="+location+"&facility="+facility, true);
                                                                xhttp.send();
                                                            }
                                                            else
                                                            {
                                                                result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Facilities.</div>';
                                                                document.getElementById("facility").focus();
                                                            }
                                                        }
                                                        else
                                                        {
                                                            result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Location.</div>';
                                                            document.getElementById("location").focus();
                                                        }
                                                    }
                                                    else
                                                    {
                                                        result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Notice Period.</div>';
                                                        document.getElementById("noticePeriod").focus();
                                                    }
                                                }
                                                else
                                                {
                                                    result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Expected Salary.</div>';
                                                    document.getElementById("expectedSalary").focus();
                                                }
                                            }
                                            else
                                            {
                                                result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Current Salary.</div>';
                                                document.getElementById("currentSalary").focus();
                                            }
                                        }
                                        else
                                        {
                                            result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Required Education.</div>';
                                            document.getElementById("educationRequired").focus();
                                        }
                                    }
                                    else
                                    {
                                        result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Required Experience.</div>';
                                        document.getElementById("experienceRequired").focus();
                                    }
                                }
                                else
                                {
                                    result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Key Skills.</div>';
                                    document.getElementById("keySkills").focus();
                                }
                            }
                            else
                            {
                                result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Job Description.</div>';
                                document.getElementById("jobDescription").focus();
                            }
                        }
                        else if(lookingService == "3")
                        {
                            //Submit Form - MANAGEMENT

                        }
                    }
                    else
                    {
                        result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Looking Service.</div>';
                        document.getElementById("lookingService").focus();
                    }
                }
                else
                {
                    result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Email Address.</div>';
                    document.getElementById("emailAddress").focus();
                }
            }
            else
            {
                result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Contact Person.</div>';
                document.getElementById("contactPerson").focus();
            }
        }
        else
        {
            result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Company Address.</div>';
            document.getElementById("companyAddress").focus();
        }
    }
    else
    {
        result.innerHTML = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Please Enter Company Name.</div>';
        document.getElementById("companyName").focus();
    }
}