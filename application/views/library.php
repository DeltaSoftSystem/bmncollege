<?php
 $feedbackform = json_decode(file_get_contents('uploads/jsondata/feedbackform.json'), true);
 $feedbackform_url = ""; 
 if(isset($feedbackform) && is_array($feedbackform)){
   $feedbackform_url = $feedbackform[0]['value'];
 }

 $library = json_decode(file_get_contents('uploads/jsondata/library.json'), true);
 $newarrivals = ""; 
 if(isset($library) && is_array($library)){
   $newarrivals = $library[0]['value'];
 } 
 $wti_cms_question_papers = json_decode(file_get_contents('uploads/jsondata/wti_cms_question_papers.json'), true);

 $wti_cms_question_master = [];
 if(!empty($wti_cms_question_papers)){
    foreach($wti_cms_question_papers as $key => $vallue){
        $wti_cms_question_master[str_replace(" ","",$vallue['group_name'])] =  $vallue['group_name'];
    }
 }

 $wti_cms_library_publication = json_decode(file_get_contents('uploads/jsondata/wti_cms_library_publication.json'), true);

 $wti_cms_library_publication_master = [];
 if(!empty($wti_cms_library_publication)){
    foreach($wti_cms_library_publication as $key => $vallue){
        $wti_cms_library_publication_master[str_replace(" ","",$vallue['group_name'])] =  $vallue['group_name'];
    }
 }
 //print_r($library);exit;

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <?php $this->load->view('inc_header_title'); ?>
    <style>
    .faculty_pic_li {
        border: 1px solid #d4d4d4;
        padding: 0px;
        text-align: center;
        background: #FFF;
        width: 100px;
        height: auto;
        display: inline-grid;
    }

    .faculty_pic_li img {
        width: 100%;
    }
    </style>
</head>

<body>

    <!--header start here-->

    <?php $this->load->view('inc_header_menu'); ?>

    <!--header close here-->

    <section class="page_name">
        <h3 class="page_name_title small">
            <?php echo $this->lang->line("Shri Kantilal (Bachusheth) Jadavji Kanji Shivji Library");?></h3>
        <p class="page_breadcrumb">
            <a href="<?php echo site_url('home')?>"><i class="fa fa-home" aria-hidden="true"></i>&nbsp; Home</a>
            <!--<i class="fa fa-angle-right next" aria-hidden="true"></i> Library-->
        </p>
    </section>




    <section class="slide_bx">
        <div class="container">
            <div class="row">
                <!--left-side-->
                <div class="col-sm-8">


                    <div class="accordion" id="accordionExample">
                        <!--<h3 class="research_title bca">About Us</h3>-->
                        <!--1 About Us-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="fa fa-graduation-cap" aria-hidden="true"></i> &nbsp;
                                    <?php echo $this->lang->line("lib_About Us");?>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <ul class="about_list">
                                            <li><i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                <?php echo $this->lang->line("The Library aims to serve the needs of faculty, research scholars, students and other members of the library by providing an excellent collection of literature. The well furnished library is located on the 8th floor of the Smt. Kamalaben Gambhirchand Shah Vidya Bhavan and is spread over 4000 square feet, with a seating capacity for around 100 students and 20 staff.");?>
                                            </li>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--2 Working Hour-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i> &nbsp; Working Hours
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="course_bx_one">
                                        <p class="working_hrs">In order to facilitate self-learning among the students,
                                            the library timings of the reading room are flexible and kept open from</p>

                                        <div class="school_timing">
                                            <h4 class="paper_title timing"><i class="fa fa-clock-o"
                                                    aria-hidden="true"></i> Regular </h4>
                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> 9.00am to
                                                        5.30 pm on weekdays</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> 9.00am to
                                                        3.30 pm on Saturdays</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="school_timing">
                                            <h4 class="paper_title timing"><i class="fa fa-clock-o"
                                                    aria-hidden="true"></i> Examination </h4>
                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> 8.30am to
                                                        6.00 pm on weekdays</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> 8.30 am to
                                                        5.00 pm on Saturdays</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="school_timing">
                                            <h4 class="paper_title timing"><i class="fa fa-clock-o"
                                                    aria-hidden="true"></i> Summer Vacation </h4>
                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> 11.00am to
                                                        4.00 pm on weekdays</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> 10.00 am to
                                                        2.00 pm on Saturdays</li>
                                                </ul>
                                            </div>
                                        </div>



                                        <p class="working_hrs">The library caters to the needs of Institutions Dr. BMN
                                            College of Home Science, Smt. HMN Junior College of Home Science &amp; Smt.
                                            Sharadaben Champaklal Nanavati Institute of Polytechnic, &amp; Smt. Kamlaben
                                            Gambhirchand Shah Department of Computer Applications, Smt. K.G.Shah Law
                                            School & Smt. Sunanda Pravin Gambhirchand Institute of Nursing and
                                            Paramedical Sciences.</p>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--3 Resources-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <i class="fa fa-building-o" aria-hidden="true"></i> &nbsp; Resources
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <div class="school_timing">
                                            <h4 class="paper_title timing"><i class="fa fa-book" aria-hidden="true"></i>
                                                The library has an extensive collection of books pertaining to</h4>
                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Junior
                                                        College (Home Science)</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> B.Sc. (Home
                                                        Science)</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Bachelor of
                                                        Computer Applications</li>

                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Fashion
                                                        &amp; Textile Designing</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Interior
                                                        Design &amp; Decoration</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Travel
                                                        &amp; Tourism</li>
                                                    <!--<li><i class="fa fa-angle-right" aria-hidden="true"></i> Law</li>-->
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="school_timing">
                                            <h4 class="paper_title timing"><i class="fa fa-book" aria-hidden="true"></i>
                                                The library also houses</h4>
                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Journals
                                                        &amp; Periodicals (Indian and Foreign)</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Newspapers
                                                    </li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Movie CDS
                                                    </li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Maps &amp;
                                                        Charts</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> CDs
                                                        (Educational &amp; those accompanying books)</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Book Bank
                                                        books</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Newspaper
                                                        clippings</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Question
                                                        papers</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Seminar and
                                                        Internship reports of the students</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Syllabi
                                                    </li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Minor
                                                        Research Reports undertaken by the teaching staff</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Issues of
                                                        the College Annual magazine "Aakansha"</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--4 Services-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <i class="fa fa-cog" aria-hidden="true"></i> &nbsp; Services
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <div class="school_timing">
                                            <h4 class="paper_title timing"><i class="fa fa-book" aria-hidden="true"></i>
                                                The library offers the following services</h4>
                                            <div class="box_cont list">
                                                <ul class="que_list ">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Reading
                                                        facilities on the premises for students and staff</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Book
                                                        Displays</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Home
                                                        lending services</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> List of
                                                        Additions, Current Awareness Service Bulletin</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                        Bibliographic services</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Online
                                                        access facilities</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Reference
                                                        services</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Online
                                                        Public Access Catalogue</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Library
                                                        Orientation</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Internet
                                                    </li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Book Bank
                                                        facility for students</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">Inter Library Loan facility</h4>
                                            <p class="working_hrs marg_zero">The students and staff library can borrow
                                                documents from other libraries on Inter Library Loan Basis. The library
                                                continues to be on the network with most libraries and information
                                                centres on mutual exchange basis. In order to procure books from other
                                                libraries, students need to carry a reference letter from the librarian.
                                                Members can borrow documents from the following libraries.</p>

                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> American
                                                        Information Resource Centre</li>
                                                    <!-- <li><i class="fa fa-angle-right" aria-hidden="true"></i> Centre for Documentation (Colaba)</li> -->
                                                    <!--<li><i class="fa fa-angle-right" aria-hidden="true"></i> Audio Video Education Resource Centre (AVEHI)</li>-->
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> S.N.D.T.
                                                        Women's University Library, at Churchgate and Juhu Campuses</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">CAS (Current Awareness Service)</h4>
                                            <p class="working_hrs marg_zero">Monthly list of additions to the library
                                                collection is displayed on the notice board and also made available
                                                online.</p>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">In-house publications</h4>
                                            <p class="working_hrs marg_zero">The Library preserves a collection of
                                                college publications viz College Magazine Aakansha; Seva Mandal
                                                Education Society's Annual reports, Annual Quality Assurance Reports,
                                                Standard Operating Procedures manual of Dr. BMN college of Home Science;
                                                IDEAS the College's Research Compilation</p>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">Display of books</h4>
                                            <p class="working_hrs marg_zero">Books are displayed every day in line with
                                                national &amp; international events, suggested themes and as per the
                                                requirement of the teachers when certain subjects are taught</p>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">Question Papers</h4>
                                            <p class="working_hrs marg_zero">Hard Copies of yesteryear question papers
                                                (Board, University and college level) are available in the Periodicals
                                                section.</p>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--5 Rules &amp; Regulations-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingfive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsefive" aria-expanded="false"
                                    aria-controls="collapseFourfive">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp; Rules &amp; Regulations
                                </button>
                            </h2>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <div class="box_cont list">
                                            <ul class="que_list ">
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Access to the
                                                    Library is restricted to staff and students of constituent colleges
                                                    of Seva Mandal Education Society. They should also possess current,
                                                    valid identification card issued by the Respective Institutions.
                                                </li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> In case of loss
                                                    of library cards, the library will make a duplicate one available on
                                                    filling up of prescribed form and payment of prescribed
                                                    fee(currently Rs.100).</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> The expiry of
                                                    the membership is stamped on the library cards. For renewal to the
                                                    successive years of the course, the students are required to
                                                    surrender the old cards at the beginning of the academic year.</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Members must
                                                    carry their identity card and library cards to gain entry and use
                                                    the library and must produce it when required to do so by an
                                                    authorized person. The library cards must be used only by the member
                                                    to whom it is issued.</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Bags and
                                                    valuables must be taken care of by the members. The library will not
                                                    be responsible in case of damage to or theft of personal property.
                                                </li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Silence is
                                                    required in study areas. Loud conversation, standing in groups, loud
                                                    discussions, etc. is forbidden. The use of mobile phones in the 8th
                                                    floor library premises is prohibited. Failure to comply with these
                                                    requirements may result in a fine and exclusion from the library.
                                                </li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Readers shall
                                                    not write upon, mark or otherwise disfigure tear and damage books.
                                                </li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Smoking,
                                                    consumption of food and drink (with the exception of bottled water)
                                                    and the use of personal audio equipment are not permitted in the
                                                    library.</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Photography,
                                                    filming, video taping and audio taping in the library is not allowed
                                                    without the prior permission of the librarian.</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Open access is
                                                    provided to Teaching staff, Scholar card holders, Final year
                                                    students of BSc & BCA and Post graduate students only. No direct
                                                    access to the shelves for regular students.</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Electrical
                                                    Mains operated personal equipment should not be used without the
                                                    prior permission of the librarian.</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Members should
                                                    keep in mind copyright issues while copying any material borrowed
                                                    from the library.</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> The removal of
                                                    any material from the library must be properly authorized and
                                                    recorded. Damage to, or unauthorized removal of material constitutes
                                                    a serious offence and may lead to a fine or to disciplinary action.
                                                </li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Access to
                                                    library and / or borrowing rights may also be withdrawn temporarily
                                                    if fines are outstanding.</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> The award of
                                                    BMN / SNDT Results may be deferred until all books have been
                                                    returned and outstanding fines/charges are paid. </li>
                                            </ul>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--6 Procedures-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingsix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapseFoursix">
                                    <i class="fa fa-refresh" aria-hidden="true"></i> &nbsp; Procedures
                                </button>
                            </h2>
                            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingsix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <div class="box_one">
                                            <h4 class="paper_title timing">Procedure for Issue &amp; Return of
                                                Books/Periodicals:</h4>

                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> To borrow a
                                                        book for reference on the premises, students will present a
                                                        requisition slip at the counter.</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Books to be
                                                        taken for reference within the library premises by the students,
                                                        (maximum 3 books) will be given against their identity cards
                                                        only.</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Latest
                                                        issue of periodicals will be displayed until the receipt of
                                                        number, and will not be issued out of the Library till then.
                                                    </li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> A book,
                                                        which is in circulation, may be reserved by other readers on
                                                        filling up a reservation slip.</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Books
                                                        borrowed should be returned on or before the due date.</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Members may
                                                        renew books by presenting them at the counter. Books will be
                                                        renewed, provided</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> They are
                                                        not in demand</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Not more
                                                        than two continuous renewals have been made.</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">Procedure for Borrowing Book-Bank Books:</h4>

                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> The list of
                                                        books available in the Book-Bank is displayed on the Library
                                                        Notice Board, at the beginning of the academic year. Student
                                                        wishing to avail this facility will be required to fill up a
                                                        form and take the parent's and respective teacher's signature.
                                                    </li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> The student
                                                        will have to pay 40% of the cost of the book/books to be
                                                        borrowed in the Accounts Department of the college.</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> On
                                                        producing the receipt the student will be given the book/books
                                                        for a semester or a year depending on the necessity of the
                                                        student.</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> When the
                                                        student returns the books after the specified period, she will
                                                        be refunded 50% of payment made for the Book-Bank books.</li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                        <!--6 Procedures-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="LibraryFines">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseLibraryFines" aria-expanded="false"
                                    aria-controls="collapseFoursix">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp; Library Fines
                                </button>
                            </h2>
                            <div id="collapseLibraryFines" class="accordion-collapse collapse"
                                aria-labelledby="LibraryFines" data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <div class="box_one">
                                            <h4 class="paper_title timing">Late return of Books and other materials</h4>

                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> The user
                                                        will be charged a fine of Rs 2/- per book/item per day for late
                                                        return. No new book will be issued if the previous book is late
                                                        for return.</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> During exam
                                                        times if books are not returned on time, the student will not be
                                                        allowed to attempt the exam paper.</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> Book bank
                                                        books issued to the student should be returned to the library on
                                                        the last day of the exams. If they fail to do so, a fine as per
                                                        the rules will be charged and the results withheld.
                                                    </li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> The removal
                                                        of any material from the library must be properly authorized and
                                                        recorded. Damage to, or unauthorized removal of material
                                                        constitutes a serious offence and may lead to a fine or
                                                        disciplinary action.</li>
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> The award
                                                        of exam Results may be deferred until all books have been
                                                        returned and outstanding fines/charges are paid.</li>

                                                </ul>
                                            </div>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">Loss of Library Cards</h4>

                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> In case of
                                                        loss of library cards, the library will make a duplicate one
                                                        available by filling up of prescribed form and paying of
                                                        prescribed fee of Rs.100/-
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="box_one">
                                            <h4 class="paper_title timing">Loss of Book or other reading materials</h4>

                                            <div class="box_cont list">
                                                <ul class="que_list">
                                                    <li><i class="fa fa-angle-right" aria-hidden="true"></i> In case of
                                                        loss of books or other reading material, the user must report
                                                        the loss to the librarian immediately. The user has either
                                                        replace the lost item with the latest edition available or pay
                                                        the cost of the lost item + 25% at the earliest. Otherwise, the
                                                        caution money or library deposit will be withheld as per rules.
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <!--7 Activities-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingseven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseseven" aria-expanded="false"
                                    aria-controls="collapseFourseven">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> &nbsp; Activities
                                </button>
                            </h2>
                            <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingseven"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <div class="box_one">
                                            <h4 class="paper_title timing">Library Orientation</h4>
                                            <p class="working_hrs marg_zero">Library arranges for a rigorous orientation
                                                programme every year for all the new entrants and sees to it that all
                                                the resources are well utilized.</p>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">Book club</h4>
                                            <p class="working_hrs marg_zero">The Book Club (in collaboration with the
                                                English Department) has been formed to inculcate reading habits,
                                                creative thinking and writing skills.</p>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">Video Screening</h4>
                                            <p class="working_hrs marg_zero">The Library arranges for screening of video
                                                CDs as per the schedule of the Book Club.</p>
                                        </div>

                                        <div class="box_one">
                                            <h4 class="paper_title timing">Institutional Membership</h4>
                                            <p class="working_hrs marg_zero">Dr. B.M.N. College of Home Science has
                                                institutional membership with:</p>
                                            <ul class="que_list">
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> American
                                                    Information Resource Centre (As a part of American Centre Library)
                                                </li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Centre for
                                                    Documentation (Colaba)</li>
                                                <!--<li><i class="fa fa-angle-right" aria-hidden="true"></i> Audio Video Education Resource Centre (AVEHI)</li>-->
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> S.N.D.T.
                                                    Women's University Library, at Churchgate and Juhu Campuses</li>
                                            </ul>

                                            <p class="working_hrs marg_zero">Members can avail facilities provided by
                                                the above institutions. Members need to carry reference letter from the
                                                Librarian and or College Identity cards issued to them.</p>
                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--8 Best Practices-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingeight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                    <i class="fa fa-bullseye" aria-hidden="true"></i> &nbsp; Best Practices
                                </button>
                            </h2>
                            <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <div class="box_one">
                                            <ul class="que_list">
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Scholar's card
                                                    to first five rank holders of FY & SY BSc. and BCA.</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Student
                                                    representatives in the Library Committee</li>
                                                <li><i class="fa fa-angle-right" aria-hidden="true"></i> Book Club in
                                                    collaboration with the English Department</li>
                                            </ul>

                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--10 Library staff-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingnine">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                                    <i class="fa fa-book" aria-hidden="true"></i> &nbsp; Library staff
                                </button>
                            </h2>
                            <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="headingnine"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="staff_bx">
                                                    <div class="faculty_pic_li"><img
                                                            src="<?php echo base_url();?>assets/images/vidya_subramanian.jpg"
                                                            alt=""></div>
                                                    <h5>Mrs. Vidya Subramanian <span>Librarian, Dr. BMN College of Home
                                                            Science</span></h5>
                                                </div>
                                            </div>
                                            <!--<div class="col-sm-7">
                            <div class="staff_bx">
                                <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                <h5>Ms. Snehal Salunkhe <span>Librarian Smt. K G Shah Law School &amp; SMES Nursing College</span></h5>
                            </div>
                        </div>-->
                                            <div class="col-sm-6">
                                                <div class="staff_bx">
                                                    <div class="faculty_pic_li"><img
                                                            src="<?php echo base_url();?>assets/images/sunil_puari.png"
                                                            alt=""></div>
                                                    <h5>Mr. Sunil Pujari <span>Library Attendant</span></h5>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-6">
                                                <div class="staff_bx">
                                                    <div class="faculty_pic_li"><img
                                                            src="<?php echo base_url();?>assets/images/apeksha_agre.jpg"
                                                            alt=""></div>
                                                    <h5>Ms. Apeksha Agre <span>Libray Clerk</span></h5>
                                                </div>
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="staff_bx">
                                                    <div class="faculty_pic_li"><img
                                                            src="<?php echo base_url();?>assets/images/tejas_jadhav.jpg"
                                                            alt=""></div>
                                                    <h5>Mr Tejas Jadhav <span> Library Attendant</span></h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--11 Library Committee-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                    <i class="fa fa-book" aria-hidden="true"></i> &nbsp; Library Committee
                                </button>
                            </h2>
                            <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">

                                    <div class="course_bx_one">
                                        <div class="row">

                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Dr. Dilip Trivedi <span>President, SMES</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Shri Pravin Shah <span>Chairman, SMES</span></h5>
                                                </div>
                                            </div>


                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Dr. Bharat Pathak<span>Hon. Secretary SMES</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Shri Vasant Khetani<span>Hon. Secretary SMES</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Shri Atul Sanghvi <span>Treasurer, SMES</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Dr Shilpa Charankar<span>Executive Secretary, SMES</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Prof Mala Pandurang <span>Chairperson, Principal/HOD
                                                            English</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Dr. Pradnya Ambre<span>Assistant Professor, Textile Science &
                                                            Apparel Design</span></h5>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Dr. Roma Gandhi<span>Assistant Professor, Resource
                                                            Management</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Dr. Harsha Chopra <span>In charge, Nutrition and
                                                            Dietetics</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Manjot Kaur<span>Assistant Professor, Dept. of Computer
                                                            Applications</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Bhavisha Sancheti<span>Assistant Prof. MSc. Clinical
                                                            Nutrition & Dietetics</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Nidhi Khimavat<span>Assistant Prof. Dept of Human
                                                            Development</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Mrs Vidya Subramanian<span>Secretary& Librarian</span></h5>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Dolly Jain <br>(MSc CND II)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Juveria Ansari <br>(MSc CND I)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Bushra Sheikh <br>(MSc CND I)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Sabahat Malik <br>(TYBSC)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Samreen Sayed <br>(TYBSC)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Fatima Khan <br>(FYBCA)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Mansi Sawant <br>(FYBCA)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Krishna Chauhan <br>(FYBCA)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Hiba Khan <br>(FYBCA)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Gloria Jacob <br>(FYBCA)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Misba Sheikh <br>(FYBCA)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Madhura Badarayani <br>(FYBSc)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Jiya A Ambekar <br>(FYBSc)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Vedanti Mahmunkar <br>(SYBSc)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Tanishka Govekar <br>(SYBSc)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Pratiksha Bendre <br>(MSc CND II)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Rida Chugta <br>(PGSSFN)<span>Student Representatives</span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Mahalaxmi Peddi<br>(TYBCA)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms Sabahat Malik <br>(SYBCA)<span>Student Representatives</span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="staff_bx">
                                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                                    <h5>Ms. Samreen Sayed <br>(SYBSC)<span>Student
                                                            Representatives</span></h5>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--12 Links-->
                        <!--<div class="accordion-item">
    <h2 class="accordion-header" id="headingEleven">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
        <i class="fa fa-link" aria-hidden="true"></i> &nbsp;  Links
      </button>
    </h2>
    <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
          <div class="course_bx_one">
            <div class="course_linking">
                <h4 class="paper_title timing">Library Evaluation Form</h4>
                <div class="box_cont list">
                    <ul class="que_list">
                        <li><a href="#"> <i class="fa fa-angle-right" aria-hidden="true"></i> https://docs.google.com/forms/d/1Y2QD9kvhCuGo9qUkDIcAob4gcmB7vABhQBjjUdt1cUA</a></li>
                    </ul>
                </div>
            </div>
              
            <div class="course_linking">
                <h4 class="paper_title timing">Gandhian Study Center</h4>
                <div class="box_cont list">
                    <ul class="que_list light_clr">
                        <li><a href="http://www.gandhistudycentre.org/" target="_blank"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> http://www.gandhistudycentre.org/
                        </a></li>
                        <li><a href="http://www.mkgandhi.org/" target="_blank"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> http://www.mkgandhi.org/
                        </a></li>
                        <li><a href="http://nmu.ac.in/" target="_blank"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> http://nmu.ac.in/
                        </a></li>
                        <li><a href="http://www.mguniversity.edu/" target="_blank"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> http://www.mguniversity.edu/
                        </a></li>
                        <li><a href="http://www.mahatma.com/" target="_blank"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> http://www.mahatma.com/
                        </a></li>
                        <li><a href="http://www.allduniv.ac.in/" target="_blank"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> http://www.allduniv.ac.in/
                        </a></li>
                        <li><a href="http://gandhismriti.gov.in/" target="_blank"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> http://gandhismriti.gov.in/
                        </a></li>
                        <li><a href="http://indiancouncilforgandhianstudies.org/" target="_blank"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> http://indiancouncilforgandhianstudies.org/
                        </a></li>
                        <li><a href="http://www.gandhimedia.org/" target="_blank"> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> http://www.gandhimedia.org/
                        </a></li>
                    </ul>
                </div>
            </div>  
              
            <div class="course_linking">
                <h4 class="paper_title timing">Library Links</h4>
                <div class="box_cont list">
                    <ul class="que_list light_clr">
                        <li> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> 
                            SNDT Women’s University Library – <a href="http://www.gandhistudycentre.org/" target="_blank">http://sndt.ac.in/</a></li>
                        <li> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> 
                            American Library – <a href="https://in.usembassy.gov/education-culture/dostihouse-mumbai/welcome/" target="_blank">https://in.usembassy.gov/education-culture/dostihouse-mumbai/welcome/</a>
                        </li>
                        <li> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> 
                            NLIST – <a href="http://nlist.inflibnet.ac.in/" target="_blank">http://nlist.inflibnet.ac.in/</a>
                        </li>
                        <li> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> 
                            E PG Pathshala – <a href="https://epgp.inflibnet.ac.in/" target="_blank">https://epgp.inflibnet.ac.in/</a>
                        </li>
                        <li> 
                            <i class="fa fa-angle-right" aria-hidden="true"></i> 
                            Vidya Mitra – <a href="http://vidyamitra.inflibnet.ac.in/" target="_blank">http://vidyamitra.inflibnet.ac.in/</a>
                        </li>    


                        
                        
                    </ul>
                </div>
            </div>   
              
            <div class="course_linking">
                <h4 class="paper_title timing">Free Ebooks &amp; Journals</h4>
                <div class="box_cont list">
                    <ul class="que_list light_clr">
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Directory of Open Access Journals – <a href="http://doaj.org/" target="_blank">http://doaj.org/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Directory of Open Access Books – <a href="http://www.doabooks.org/" target="_blank">http://www.doabooks.org/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            World cat – <a href="https://www.worldcat.org/" target="_blank">https://www.worldcat.org/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Online Union Catalogue of Indian Universities – <a href="http://indcat.inflibnet.ac.in/" target="_blank">http://indcat.inflibnet.ac.in/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Social Science Research Network – <a href="http://www.ssrn.com/en/" target="_blank">http://www.ssrn.com/en/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            OAPEN Open Access – <a href="http://www.oapen.org/home" target="_blank">http://www.oapen.org/home</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Free full pdf – <a href="http://www.freefullpdf.com/#gsc.tab=0" target="_blank">http://www.freefullpdf.com/#gsc.tab=0</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Springer Open – <a href="http://www.springeropen.com/" target="_blank">http://www.springeropen.com/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Wiley Open Access – <a href="http://www.wileyopenaccess.com/view/<?php echo site_url('home')?>" target="_blank">http://www.wileyopenaccess.com/view/<?php echo site_url('home')?></a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Elsevier Open Access – <a href="http://www.elsevier.com/about/open-access" target="_blank">http://www.elsevier.com/about/open-access</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            The Directory of Open Access Repositories OpenDOAR – <a href="http://www.opendoar.org/" target="_blank">http://www.opendoar.org/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Project Guttenberg : Free e books – <a href="https://www.gutenberg.org/" target="_blank">https://www.gutenberg.org/</a>
                        </li>    


                        
                    </ul>
                </div>
            </div>  
              
            <div class="course_linking">
                <h4 class="paper_title timing">Free Educational Sources</h4>
                <div class="box_cont list">
                    <ul class="que_list light_clr">
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>                            
                            National Digital Library – <a href="https://ndl.iitkgp.ac.in/" target="_blank">https://ndl.iitkgp.ac.in/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Data Portal India – <a href="https://data.gov.in/" target="_blank">https://data.gov.in/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            World Library of Science – <a href="http://www.nature.com/wls" target="_blank">http://www.nature.com/wls</a>
                        </li>
                    </ul>
                </div>
            </div>  
              
            <div class="course_linking">
                <h4 class="paper_title timing">Tools for Researchers</h4>
                <div class="box_cont list">
                    <ul class="que_list light_clr">
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                        Author Aid – <a href="http://www.authoraid.info/en/" target="_blank">http://www.authoraid.info/en/</a>
                        </li>    
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>    
                        Digital tool for Researchers – <a href="http://connectedresearchers.com/online-tools-for-researchers/" target="_blank">http://connectedresearchers.com/online-tools-for-researchers/</a>
                        </li>   
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>    
                            Tables of Contents (Journals) – <a href="http://www.journaltocs.hw.ac.uk/" target="_blank">http://www.journaltocs.hw.ac.uk/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>    
                            Citation – <a href="http://www.citationmachine.net/" target="_blank">http://www.citationmachine.net/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>    
                            Bibliographies – <a href="https://www.zotero.org/support/creating_bibliographies" target="_blank">https://www.zotero.org/support/creating_bibliographies</a>
                        </li>  
                    </ul>
                </div>
            </div>  
              
            <div class="course_linking">
                <h4 class="paper_title timing">Thesis &amp; Dissertations</h4>
                <div class="box_cont list">
                    <ul class="que_list light_clr">
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                        Shodhganga – <a href="http://shodhganga.inflibnet.ac.in/" target="_blank">http://shodhganga.inflibnet.ac.in/</a>
                        </li>  
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Networked Digital Library of Theses and Dissertations – <a href="http://www.ndltd.org/" target="_blank">http://www.ndltd.org/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                        Open Access Theses and Dissertations – <a href="1" target="_blank">https://oatd.org/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            Open Thesis – <a href="https://www.openthesis.org" target="_blank">www.openthesis.org/</a>
                        </li>
                        <li><i class="fa fa-angle-right" aria-hidden="true"></i>
                            MSc Thesis – <a href="https://www.bmncollege.com/wp-content/uploads/2017/10/MSc-Research-5-years-1.pdf" target="_blank">https://www.bmncollege.com/wp-content/uploads/2017/10/MSc-Research-5-years-1.pdf</a>
                        </li>    
                          
                    </ul>
                </div>
            </div>    
                
               
            
          </div>
          
          
      </div>
    </div>
  </div>    -->

                    </div>


                    <div class="lib_link">Ask your librarian : <a
                            href="mailto:library@bmncollege.com">library@bmncollege.com</a>
                    </div>
                    <div class="row pt-4">
                        <div class="col-3"><a href="https://ndl.iitkgp.ac.in/" target="_blank">
                                 <img
                                    src="assets/images/National Digital Library.png">
                            </a></div>
                        <div class="col-3"><a href="https://nlist.inflibnet.ac.in/" target="_blank">
                                <img
                                    src="assets/images/N-List logo.jpg">
                            </a></div>
                        <div class="col-3"><a href="https://shodhganga.inflibnet.ac.in/" target="_blank">
                                 <img
                                    src="assets/images/Shodhganga_Logo.jpg">
                            </a></div>
                        <div class="col-3"><a href="https://epgp.inflibnet.ac.in/" target="_blank">
                                 <img
                                    src="assets/images/e-PG Pathshala.png">
                            </a></div>
                            <div class="col-3 mt-2"><a href="https://nmeict.ac.in/" target="_blank">
                                 <img
                                    src="assets/images/nmeict.png">
                            </a></div>

                            <div class="col-3 mt-2">
                                <a href="https://lumivero.com/products/nvivo/" target="_blank">
                                    <img src="assets/images/nvivo.png">
                                </a>
                            </div>
                            <div class="col-3 mt-2">
                                <a href="https://www.ibm.com/products/spss-statistics" target="_blank">
                                    <img src="assets/images/ibmspss.png">
                                </a>
                            </div>
                            

                    </div>



                </div>

                <!--right-sidebar-->
                <div class="col-sm-4">

                    <!--right side accordion-->
                    <div class="accordion" id="accordionExample1">
                        <!--<h3 class="research_title bca">About Us</h3>-->



                        <!--1 New Arrivals-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselabOne" aria-expanded="true"
                                    aria-controls="collapselabOne">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i> &nbsp; New Arrivals
                                </button>
                            </h2>
                            <div id="collapselabOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">

                                    <div class="box_cont bordertwo">
                                        <ul class="que_list">
                                            <li><a href="<?php echo base_url();?>uploads/cms/<?php echo $newarrivals;?>"
                                                    target="_blank">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i> List of Books
                                                </a></li>
                                            <!--<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Journals</a></li>-->
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!--7 Library Opac-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingseven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselabSeven" aria-expanded="false"
                                    aria-controls="collapselabSeven">
                                    <i class="fa fa-book" aria-hidden="true"></i> &nbsp; Library OPAC / Online Catalog
                                </button>
                            </h2>
                            <div id="collapselabSeven" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body">

                                    <div class="opec_txt">
                                        <p>
                                            Library Collection is available 24 by 7 <br>
                                            Please Visit The Following Link : <br>
                                            <a href="http://202.177.224.211/iopac/" target="_blank"><i
                                                    class="fa fa-angle-right" aria-hidden="true"></i> &nbsp;
                                                http://202.177.224.211/iopac/</a>
                                        </p>

                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--7 Library Membership-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingNinteen">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselabNinteen" aria-expanded="false"
                                    aria-controls="collapselabNinteen">
                                    <i class="fa fa-book" aria-hidden="true"></i> &nbsp; Membership
                                </button>
                            </h2>
                            <div id="collapselabNinteen" class="accordion-collapse collapse"
                                aria-labelledby="headingfive" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">


                                    <div class="opec_txt">
                                        <p>
                                            Library Membership – <br>
                                            <a href="http://202.177.224.211/iadmission/" target="_blank"><i
                                                    class="fa fa-angle-right" aria-hidden="true"></i> &nbsp;
                                                http://202.177.224.211/iadmission/</a>
                                        </p>

                                    </div>


                                </div>
                            </div>
                        </div>

                        <!--2 Publications-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselabTwo" aria-expanded="false"
                                    aria-controls="collapselabTwo">

                                    <i class="fa fa-print" aria-hidden="true"></i> &nbsp; Publications
                                </button>
                            </h2>
                            <div id="collapselabTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body">

                                    <div class="paper_one">

                                        <?php
                                        foreach($wti_cms_library_publication_master as $key => $mvalue){
                                        ?>
                                        <h3 class="course_sb_head tabs"><i class="fa fa-dot-circle-o"
                                                aria-hidden="true"></i> <?php echo $mvalue?></h3>
                                        <ul class="que_list">
                                            <?php
                                            foreach($wti_cms_library_publication as $key2 => $value){
                                                if($value['group_name'] == $mvalue){
                                            ?>
                                            <li><a href="<?php  echo base_url($value['pdf_file'])?>" target="_blank">
                                                    <i class="fa fa-angle-right"
                                                        aria-hidden="true"></i><?php echo $value['name'];?>
                                                </a></li>
                                            <?php 
                                            }
                                            ?>
                                            <?php 
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <?php 
                                            }
                                            ?>
                                    <!-- <div class="paper_one">
                                        <h3 class="course_sb_head tabs"><i class="fa fa-dot-circle-o"
                                                aria-hidden="true"></i> Teachers Publication </h3>
                                        <ul class="que_list">
                                            <li><a href="<?php echo base_url();?>uploads/pdf/teachers-publications-2017-2018.pdf"
                                                    target="_blank">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i> Teachers
                                                    Publications 2017-2018
                                                </a></li>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/teachers-publication-2018-2019.pdf"
                                                    target="_blank">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i> Teachers
                                                    Publication 2018-2019
                                                </a></li>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/teachers-publication-2019-2020.pdf"
                                                    target="_blank">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i> Teachers
                                                    publication 2019-2020
                                                </a></li>
                                            <li><a href="<?php echo base_url();?>uploads/pdf/teachers-publications-2021-2022.pdf"
                                                    target="_blank">
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i> Teacher's
                                                    Publications 2021-2022
                                                </a></li>
                                        </ul>
                                    </div> -->
                                    <div class="clr"></div>

                                </div>
                            </div>
                        </div>

                        <!--3 Question Papers-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselabThree" aria-expanded="false"
                                    aria-controls="collapselabThree">
                                    <i class="fa fa-question-circle" aria-hidden="true"></i> &nbsp; Question Papers
                                </button>
                            </h2>
                            <div id="collapselabThree" class="paper_one_question accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample1">
                                <div class="accordion-body">

                                    <div class="paper_one">
                                        <div class="accordion" id="accordionExample2">
                                            <?php
                                            foreach($wti_cms_question_master as $key => $mvalue){
                                            ?>
                                            <div class="accordion-item">
                                                <h3 class=" accordion-header" id="<?php echo $key?>1">
                                                    <button class="course_sb_head  accordion-button collapsed"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#<?php echo $key?>" aria-expanded="false"
                                                        aria-controls="<?php echo $key?>">
                                                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                                                        <?php echo $mvalue?>
                                                    </button>
                                                </h3>
                                                <div id="<?php echo $key?>" class="accordion-collapse collapse show1 "
                                                    aria-labelledby="<?php echo $key?>1"
                                                    data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body">
                                                        <ul class="que_list">
                                                            <?php
                                                        foreach($wti_cms_question_papers as $key2 => $value){
                                                            if($value['group_name'] == $mvalue){
                                                               // print_r($value);
                                                                $link_name = $value['link_name'];
                                                                if($link_name!=""){
                                                                    $link_name_temp = $link_name;
                                                                } else {
                                                                    $link_name_temp = base_url($value['pdf_file']);
                                                                }

                                                        ?>
                                                            <li><a href="<?php echo $link_name_temp?>"
                                                                    target="_blank"><i class="fa fa-angle-right"
                                                                        aria-hidden="true"></i>
                                                                    <?php echo $value['name']?> </a></li>
                                                            <?php }?>
                                                            <?php }?>


                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php 
                                            }
                                            ?>
                                            <!-- <div class="accordion-item">
                                                <h3 class=" accordion-header" id="MScCNDQuestionPapers1">
                                                    <button class="course_sb_head  accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#MScCNDQuestionPapers"
                                                        aria-expanded="false" aria-controls="MScCNDQuestionPapers">
                                                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i> MSc CND
                                                        Question Papers
                                                    </button>
                                                </h3>
                                                <div id="MScCNDQuestionPapers" class="accordion-collapse collapse show1 "
                                                    aria-labelledby="MScCNDQuestionPapers1"
                                                    data-bs-parent="#accordionExample2">
                                                    <div class="accordion-body">
                                                        <ul class="que_list">
                                                            <li><a href="#"><i class="fa fa-angle-right"
                                                                        aria-hidden="true"></i> MSc CND
                                                                    Question Papers - 2017-2018 </a></li>
                                                            <li class="left_space"><a href="#"><i
                                                                        class="fa fa-angle-right"
                                                                        aria-hidden="true"></i> FYMSC Question Papers
                                                                </a></li>
                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div> -->

                                        </div>

                                    </div>






                                </div>
                            </div>
                        </div>

                        <!--4 E- Resources-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselabFour" aria-expanded="false"
                                    aria-controls="collapselabFour">
                                    <i class="fa fa-building-o" aria-hidden="true"></i> &nbsp; E- Resources
                                </button>
                            </h2>
                            <div id="collapselabFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body">

                                    <ul class="que_list">
                                        <li><a href="<?php echo base_url();?>uploads/pdf/E-Resources.pdf"
                                                target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i>Digital Library
                                            </a></li>
                                        <li><a href="<?php echo base_url();?>uploads/pdf/open-thesis-and-dissertations.pdf"
                                                target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> Tools for
                                                Researchers Thesis &amp; Dissertations
                                            </a></li>
                                        <li><a href="<?php echo base_url();?>uploads/pdf/sources-for-literature-review.pdf"
                                                target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> Sources for
                                                Literature Review
                                            </a></li>
                                        <li><a href="<?php echo base_url();?>uploads/pdf/E-Books-&-journals.pdf"
                                                target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> Open Access E-Books
                                                &amp; Journals
                                            </a></li>
                                        <li><a href="<?php echo base_url();?>uploads/pdf/common-niist-login-&-passwords.pdf"
                                                target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> Common Nlist Login
                                                &amp; Passwords
                                            </a></li>
                                        <li><a href="<?php echo base_url();?>uploads/pdf/databases.pdf" target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> Databases
                                            </a></li>

                                        <!-- <li><a href="<?php echo base_url();?>uploads/pdf/suggestions.pdf"
                                                target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i><img src="assets/images/suggestion-icon.jpg" >Suggestions
                                            </a></li>
                                        <li><a href="<?php echo base_url();?>uploads/pdf/books-journal-suggestion-form.pdf"
                                                target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i><img src="assets/images/book icon.png" style="width: 25px;height:auto"  > Book Recommendation
                                                Form
                                            </a></li> -->

                                        <li><a href="<?php echo base_url();?>uploads/pdf/Newspapersfinal17thJan.pdf"
                                                target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> E-news paper
                                            </a></li>

                                        <!-- <li><a href="https://ndl.iitkgp.ac.in/" target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> <img
                                                    src="assets/images/National Digital Library.png">
                                            </a></li>
                                        <li><a href="https://nlist.inflibnet.ac.in/" target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i><img
                                                    src="assets/images/N-List logo.jpg">
                                            </a></li>
                                        <li><a href="https://shodhganga.inflibnet.ac.in/" target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> <img
                                                    src="assets/images/Shodhganga_Logo.jpg">
                                            </a></li>
                                        <li><a href="https://epgp.inflibnet.ac.in/" target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> <img
                                                    src="assets/images/e-PG Pathshala.png">
                                            </a></li> -->

                                        <li><a href="<?php echo base_url();?>uploads/pdf/OtherLibraries.pdf"
                                                target="_blank">
                                                <i class="fa fa-angle-right" aria-hidden="true"></i> Others libraries
                                            </a></li>

                                        <!--<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Open Access  Educational Resources</a></li>
            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Open Access E-Books &amp; Journals</a></li>
            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Online Consortium</a></li>
            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Open Access Educational Sources</a></li>
            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Tools for Researchers Thesis &amp; Dissertations </a></li>-->
                                    </ul>


                                </div>
                            </div>
                        </div>

                        <!--5 Downloads-->
                        <!--<div class="accordion-item">
    <h2 class="accordion-header" id="headingfive">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapselabFive" aria-expanded="false" aria-controls="collapselabFive">
        <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Downloads
      </button>
    </h2>
    <div id="collapselabFive" class="accordion-collapse collapse" aria-labelledby="headingfive" data-bs-parent="#accordionExample1">
      <div class="accordion-body">
        
          <ul class="que_list">
            <li><a href="<?php echo base_url();?>uploads/pdf/suggestions.pdf" target="_blank">
                <i class="fa fa-angle-right" aria-hidden="true"></i> Suggestions 
            </a></li>
            <li><a href="<?php echo base_url();?>uploads/pdf/books-journal-suggestion-form.pdf" target="_blank">
                <i class="fa fa-angle-right" aria-hidden="true"></i> Book Recommendation Form
            </a></li>
            <li><a href="<?php echo base_url();?>uploads/pdf/others.pdf" target="_blank">
                <i class="fa fa-angle-right" aria-hidden="true"></i> Others
            </a></li> 
        </ul>
          
          
      </div>
    </div>
  </div>-->

                        <!--6 Anti Plagiarism Software-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingsix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselabSix" aria-expanded="false"
                                    aria-controls="collapselabSix">
                                    <i class="fa fa-cube" aria-hidden="true"></i> &nbsp; Anti Plagiarism Software
                                </button>
                            </h2>
                            <div id="collapselabSix" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body">

                                    <ul class="que_list">
                                        <li><a href="<?php echo base_url();?>uploads/pdf/anti-plagiarism-tools.pdf"
                                                target="_blank"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                Anti Plagiarism Tools</a></li>
                                        <!--<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Others</a></li>-->
                                    </ul>


                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading7">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselab7" aria-expanded="false" aria-controls="collapselab7">
                                    <img src="assets/images/suggestions-icon.png" style="width: 50px;height:25px;margin-left:-18px"> Suggestions
                                </button>
                            </h2>
                            <div id="collapselab7" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body">

                                    <ul class="que_list">
                                        <li><a href="<?php echo base_url();?>uploads/pdf/suggestions.pdf"
                                                target="_blank"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                Suggestion form</a></li>

                                    </ul>


                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselab8" aria-expanded="false" aria-controls="collapselab8">
                                    <img src="assets/images/book icon.png" width="25px"> &nbsp; Book Recommendation Form
                                </button>
                            </h2>
                            <div id="collapselab8" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body">

                                    <ul class="que_list">
                                        <li><a href="<?php echo base_url();?>uploads/pdf/suggestions.pdf"
                                                target="_blank"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                Book Recommendation Form</a></li>

                                    </ul>


                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading8">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapselab9" aria-expanded="false" aria-controls="collapselab9">
                                    <img src="assets/images/book icon.png" width="25px"> &nbsp; National Mission In Education Through ICT
                                </button>
                            </h2>
                            <div id="collapselab9" class="accordion-collapse collapse" aria-labelledby="headingfive"
                                data-bs-parent="#accordionExample1">
                                <div class="accordion-body">

                                    <ul class="que_list">
                                        <li><a href="<?php echo base_url();?>uploads/pdf/Digital ICT Initiatives_MHRD.pdf"
                                                target="_blank"><i class="fa fa-angle-right" aria-hidden="true"></i>
                                                National Mission In Education Through ICT</a></li>

                                    </ul>


                                </div>
                            </div>
                        </div>
                        <div class="dicover_div pt-3">
                            <a href="<?php echo $feedbackform_url?>" target="_blank" class="discover_btn">Feedback</a>
                        </div>
                    </div>



                    <!--notice slider start here-->
                    <!-- <div class="ques_bx notices">
        <h4 class="paper_title"><i class="fa fa-list-alt" aria-hidden="true"></i> &nbsp; Notices</h4>
        <marquee behavior="scroll" direction="up" scrollamount="3">
            <div class="scroll_notice">
                <span><i class="fa fa-calendar" aria-hidden="true"></i> December 14,2021</span>
                <h3 class="latest_title">Lorem Ipsum is simply dummy text of the printing and type setting</h3>
                <p>Learning to live, study and work in a thriving business capital is exciting, Duis aute irure dolor in reprehenderit in voluptate</p>
            </div>

            <div class="scroll_notice">
                <span><i class="fa fa-calendar" aria-hidden="true"></i> December 14,2021</span>
                <h3 class="latest_title">Lorem Ipsum is simply dummy text of the printing and type setting</h3>
                <p>Learning to live, study and work in a thriving business capital is exciting, Duis aute irure dolor in reprehenderit in voluptate</p>
            </div>

            <div class="scroll_notice">
                <span><i class="fa fa-calendar" aria-hidden="true"></i> December 14,2021</span>
                <h3 class="latest_title">Lorem Ipsum is simply dummy text of the printing and type setting</h3>
                <p>Learning to live, study and work in a thriving business capital is exciting, Duis aute irure dolor in reprehenderit in voluptate</p>
            </div>

            <div class="scroll_notice">
                <span><i class="fa fa-calendar" aria-hidden="true"></i> December 14,2021</span>
                <h3 class="latest_title">Lorem Ipsum is simply dummy text of the printing and type setting</h3>
                <p>Learning to live, study and work in a thriving business capital is exciting, Duis aute irure dolor in reprehenderit in voluptate</p>
            </div>
        </marquee>
    </div> -->
                    <!--notice slider close here-->



                </div>
            </div>
        </div>
    </section>



    <?php $this->load->view('inc_footer'); ?>



    <?php $this->load->view('inc_common_footer_js'); ?>


</body>

</html>