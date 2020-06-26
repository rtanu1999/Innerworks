<?php
$serviceNumber = $result = "";
if(isset($_GET['service']) && !empty($_GET['service']))
{
    $serviceNumber = $_GET['service'];
    if($serviceNumber == "1")
    {
        $result = '<div id="recruitment">
                               <div class="row">
                                   <div class="col-md-12">
                                       <h3>Recruitment</h3>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-4">
                                       <label for="jobDescription">Job Description</label>
                                       <input type="text" name="jobDescription" id="jobDescription" class="form-control" required>
                                   </div>
                                   <div class="col-md-4">
                                       <label for="mySkills">Key Skills</label>
                                       <input type="text" name="mySkills" id="mySkills" class="form-control" required>
                                   </div>
                                   <div class="col-md-4">
                                       <label for="experiencedRequired">Experience Required</label>
                                       <input type="text" name="experiencedRequired" id="experiencedRequired" class="form-control" required>
                                   </div>
                               </div>
                               <div class="row">
                                   <div class="col-md-4">
                                       <label for="education">Education</label>
                                       <input type="text" name="education" id="education" class="form-control" required>
                                   </div>
                                   <div class="col-md-4">
                                       <label for="salary">Salary</label>
                                       <input type="text" name="salary" id="salary" class="form-control" required>
                                   </div>
                               </div>
                           </div>';
    }
    else if($serviceNumber == "2")
    {
        $result = '<div id="staffing">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Staffing</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="jobDescription">Job Description</label>
                                        <input type="text" name="jobDescription" id="jobDescription" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="keySkills">Key Skills</label>
                                        <input type="text" name="keySkills" id="keySkills" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="experienceRequired">Experience Required</label>
                                        <input type="text" name="experienceRequired" id="experienceRequired" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="educationRequired">Education Required</label>
                                        <input type="text" name="educationRequired" id="educationRequired" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="currentSalary">Current Salary</label>
                                        <input type="text" name="currentSalary" id="currentSalary" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="expectedSalary">Expected Salary</label>
                                        <input type="text" name="expectedSalary" id="expectedSalary" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="noticePeriod">Notice Period</label>
                                        <input type="text" name="noticePeriod" id="noticePeriod" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" id="location" class="form-control" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="facility">Facility</label>
                                        <input type="text" name="facility" id="facility" placeholder="Canteen/ Bus/ Cab/ Other" class="form-control" required>
                                    </div>
                                </div>
                            </div>';
    }
    else if($serviceNumber == "3")
    {
        $result = '<div id="management">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Management Services</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="checkBxLabel">HR Audit
                                            <input type="checkbox" name="" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkBxLabel">HR Policies & Procedures Formulation
                                            <input type="checkbox" name="" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkBxLabel">Statutory Audit
                                            <input type="checkbox" name="" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkBxLabel">Statutotary Support Service (Monthly Statutory Returns)
                                            <input type="checkbox" name="" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="checkBxLabel">Training
                                            <input type="checkbox" name="" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkBxLabel">Factory Plan Approval, License & renewal
                                            <input type="checkbox" name="" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkBxLabel">MPCB Consent to Establishment, operate & Renewal
                                            <input type="checkbox" name="" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="checkBxLabel">Labour License for Contractor & RC for Employer
                                            <input type="checkbox" name="" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="checkBxLabel">PF & ESIC Monthly Returnsl
                                            <input type="checkbox" name="" >
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-9"></div>
                                </div>
                            </div>';
    }
}

echo $result;

?>