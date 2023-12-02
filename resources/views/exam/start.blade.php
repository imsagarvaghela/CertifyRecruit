<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Online Exam</title>
    <meta name="keywords" content="icnd1 course, icnd2 course, iins course, ccda course, ccent course, ccna course, icnd1, icnd2, iins, ccda, ccna security, ccent certification, ccna certification, ccda certification, 100-101 exam, 200">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="{{asset('/images/favicon.ico')}}" />
    <!-- Bootstrap CSS -->
    <link href="{{asset('/exam_resource/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/exam_resource/css/fonts.css')}}">
    <link rel="stylesheet" href="{{asset('/exam_resource/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    /* Overlay */
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
        z-index: 9999; /* Place the overlay above everything */
        display: none;
    }

    /* Loader */
    .loading-spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 10000; /* Place the loader above the overlay */
        display: none;
    }

    .loader {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        border-radius: 50%;
        width: 80px;
        height: 80px;
        animation: spin 2s linear infinite;
    }
    
    .logo {
        width: 25%;
    }
    
    .navbar-toggler {
        border-color: blue;
        background-color: cornflowerblue;
    }
    
    @media (max-width: 768px) {
        .logo {
            width: 50%;
        }
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>
</head>

<body>
    <header class=" mb-4">
        <nav class="navbar navbar-expand-lg navbar-dark blue-bg" style="background: #f5f5f5;">
            <a class="navbar-brand" href="#"><img src="{{asset('storage/images/logo.png')}}" alt="" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <div id="digits" class="align-items-center">
                        <div class="time-heading-wrap">
                            <img src="{{asset('/exam_resource/images/time-icon.png')}}" alt="">
                            <span>Time Left</span>
                        </div>
                        <p>Hours<span class="colon">: </span><span class="digits" id="hh"></span></p>
                        <p>Mins<span class="colon">: </span><span class="digits" id="mm"></span></p>
                        <p>Secs<span class="colon last">: </span><span class="digits" id="ss"></span></p>
                    </div>
                </ul>
            </div>
        </nav>
    </header>
    <div id="overlay" class="overlay"></div>
    
    <!-- Loader -->
    <div id="loading-spinner" class="loading-spinner">
        <div class="loader"></div>
    </div>

    <div class="col-12">
        <div class="row">
            <div class="col-md-8">
                <div class="b-skills mb-4">
                    <div class="row">
                        <div class="col-12 border-bottom mb-4 px-4">
                            <div class="d-flex mb-2">
                                <h1 class="heading"><span id="questionNo"></span></h1>
                                <!-- <span class="ms-auto">Mark 1</span> -->
                            </div>
                        </div>
                        <div class="col-12 px-4">
                            <p id="question"></p>
                            <table class="table table-striped table-hover" id="options">
                            </table>
                            <div class="wrapper">
                                <button type="button" class="btn btn-outline-secondary mt-4 px-3 mx-3" onclick="mark()">Mark for Review & Next</button>
                                <button type="button" class="btn btn-outline-secondary mt-4 px-3" onclick="previous()">Previous</button>
                                <button type="button" class="btn btn-outline-secondary mt-4 px-3 mx-3" onclick="next()">Next</button>
                                <button type="button" class="btn btn-primary mt-4 px-3  ms-auto" onclick="saveAndNext()">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="b-skills mb-4">
                    <h2 class="heading-wrap text-center mb-4">Examination Details<i class="bi bi-arrow-down-up" style="float:right;" onclick="hide('examDetails');"></i></h2>
                    <p id="examDetails" data-visible="true"></p>
                </div>
                <div class="b-skills mb-4">
                    <h2 class="heading-wrap text-center mb-4">Question Palette</i></h2>
                    <div class="justify-content-center">
                        <ul class="question-list-wrap" id="listOfQuestions">
                        </ul>
                    </div>
                    <div class="row">
                        <div class="palette-guide-wrap">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="guide-list-wrap d-flex align-items-center">
                                            <div class="guide-list-color-wrap not-visited"></div>
                                            <span>Not Visited</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="guide-list-wrap d-flex align-items-center">
                                            <div class="guide-list-color-wrap answered"></div>
                                            <span>Answered</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="guide-list-wrap d-flex align-items-center">
                                            <div class="guide-list-color-wrap not-answered"></div>
                                            <span>Not Answered</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="guide-list-wrap d-flex align-items-center">
                                            <div class="guide-list-color-wrap markedForReview"></div>
                                            <span>Marked for Review</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="guide-list-wrap d-flex align-items-center">
                                            <div class="guide-list-color-wrap answered-markedForReview"></div>
                                            <span>Answered and Mark for Review</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary mt-4 px-5" onclick="save('Complete')">Finish</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <link rel="icon" href="favicon.ico"> -->
    <script src="{{asset('/exam_resource/js/jquery.min.js')}}"></script>
    <script src="{{asset('/exam_resource/js/bootstrap.min.js')}}"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('/exam_resource/js/devtoop.js')}}"></script>
    <?php

    use Illuminate\Support\Facades\URL;

    $timerTime = App\Http\Controllers\ExamController::startTime($id);
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        button.swal-button.swal-button--cancel {
            display: none;
        }
    </style>
    <script>
        function showLoader() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('loading-spinner').style.display = 'block';
            document.body.style.overflow = 'hidden'; // Prevent scrolling
        }

        function hideLoader() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('loading-spinner').style.display = 'none';
            document.body.style.overflow = ''; // Restore scrolling
        }
</script>
<script>
    $(document).ready(function () {
        // Open the navigation menu on page load
        $('.navbar-collapse').addClass('show');

        // Toggle navigation menu when the button is clicked
        $('.navbar-toggler').on('click', function () {
            $('.navbar-collapse').toggleClass('toggle');
        });

        // Close the navigation menu when a menu item is clicked
        $('.navbar-nav a').on('click', function () {
            $('.navbar-collapse').removeClass('toggle');
        });
    });
</script>
    <script type="text/javascript">
        var web_url = '<?php echo URL::to('/'); ?>/';
        var max_time = '<?php echo $timerTime; ?>';
        var countDownDate = new Date(max_time).getTime();
        var now = new Date('<?php echo date("M d, Y H:i:s"); ?>').getTime();

        var x = setInterval(function() {
            var distance = countDownDate - now;
            now = now + 1000;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            $('#hh').text(aZero(hours));
            $('#mm').text(aZero(minutes));
            $('#ss').text(aZero(seconds));

            if (distance <= 0) {
                swal({
                        title: "Sorry",
                        text: "Your Exam Time is Over",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        closeOnClickOutside: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            save("Complete");
                        } else {
                            save("Complete");
                        }
                    });

                clearInterval(x);
            }
        }, 1000);

        function aZero(n) {
            return n.toString().length == 1 ? n = '0' + n : n;
        }
    </script>
</body>

</html>
@push('scripts')
<script type="text/javascript">
    var id = '<?php echo $id; ?>';
    var sampleExamData;

    $(document).ready(function() {
        $.ajax({
            url: web_url + 'get-exam-question/' + id,
            type: 'GET',
            async: false,
            dataType: 'json',
            success: function(data) {
                sampleExamData = data.questions;
                loadExam();
                renderQuestion();
            }
        });
    });

    window.addEventListener('keydown', function(e) {
        // Check for Ctrl + Shift + I or F12 key combinations
        if ((e.ctrlKey && e.shiftKey && e.code === 'KeyI') || e.code === 'F12') {
            // Show warning message for opening DevTools
            swal({
                title: "Warning",
                text: "Please do not use DevTools or Inspect during the exam. Your exam progress will be saved.",
                icon: "warning",
                buttons: false,
                timer: 10000,
            }).then(() => {
                // Save the exam progress (you can save it here or at the end of the exam)
                save("DevToolsOpen");
            });
        }
    });
    var listOfQuestions = $('#listOfQuestions');
    var question = $('#question');
    var questionNo = $('#questionNo');
    var options = $('#options');
    var examDetails = $('#examDetails');
    var error = $('#error');
    var note = $('#note');
    var MARKEDFORREVIEW = "markedForReview";
    var ANSWERED = "answered";
    var NOTANSWERED = "not-answered";
    var ANSWEREDMARKEDFORREVIEW = "answered-markedForReview";

    var currentQuestion = 0;
    var questionDisabledStatus = [];

    function saveAndNext() {
        var numberOfQuestions = sampleExamData.questions.length;

        if (currentQuestion !== null) {
            var q = sampleExamData.questions[currentQuestion];
            var type = q.type;

            if (type === 1) {
                var getSelectedValue = document.querySelector('input[name="single"]:checked');
                if (getSelectedValue !== null) {
                    var answer = getSelectedValue.value;
                    q.studentInput[0].answer = answer;
                    q.studentInput[0].type = ANSWERED;
                    q.studentInput[0].notes = note.val();

                    // Disable only unselected radio buttons for the current question
                    $('input[name="single"]').not(':checked').attr('disabled', true);
                    questionDisabledStatus[currentQuestion] = true;
                } else {
                    q.studentInput[0].type = NOTANSWERED;
                }
            }

            save("In progress");
            setTimeout(function () {
                next();
            }, 1500);
        } else {
            error.text('Please select an answer.');
            console.log("Single Selected: [not selected any value]");
        }
        loadExam();
        renderQuestion();
    }

    function previous() {
        var numberOfQuesiton = sampleExamData.questions.length;
        if (currentQuestion != 0) {
            currentQuestion = currentQuestion - 1;
        } else {
            currentQuestion = numberOfQuesiton - 1;
        }
        renderQuestion();
    }

    function next() {
        var numberOfQuestions = sampleExamData.questions.length;
        if (currentQuestion < numberOfQuestions - 1) {
            currentQuestion = currentQuestion + 1;
        } else {
            currentQuestion = 0;
        }
        renderQuestion();
    }

    function goto(questionId) {
        currentQuestion = questionId;
        renderQuestion();
    }

    function mark() {
        if (currentQuestion != null) {
            var q = sampleExamData.questions[currentQuestion];
            var type = q.type;
            if (type == 1) {
                var getSelectedValue = document.querySelector('input[name="single"]:checked');
                if (getSelectedValue != null) {
                    var answser = getSelectedValue.value;
                    q.studentInput[0].answer = answser;
                    q.studentInput[0].type = ANSWEREDMARKEDFORREVIEW;
                    q.studentInput[0].notes = note.val();
                } else {
                    q.studentInput[0].type = MARKEDFORREVIEW;
                }
            } else if (type == 2) {
                var values = new Array();
                $.each($("input[name='multiple']:checked"), function() {
                    values.push($(this).val());
                });
                if (values != null && values.length > 0) {
                    q.studentInput[0].answer = values;
                    q.studentInput[0].type = ANSWEREDMARKEDFORREVIEW;
                    q.studentInput[0].notes = note.val();
                } else {
                    q.studentInput[0].type = MARKEDFORREVIEW;
                }
            } else {
                console.log('invalid type');
            }
            var numberOfQuesiton = sampleExamData.questions.length;
            if (currentQuestion < (numberOfQuesiton - 1)) {
                currentQuestion = currentQuestion + 1;
            } else {
                currentQuestion = 0;
            }
            save("In progress");
            loadExam();
            renderQuestion();
        } else {
            error.text('Please select on answer.');
        }
    }

    function clearQuerstion() {
        if (currentQuestion != null) {
            var q = sampleExamData.questions[currentQuestion];
            var type = q.type;
            if (type == 1) {
                var getSelectedValue = document.querySelector('input[name="single"]:checked');
                if (getSelectedValue != null) {
                    getSelectedValue.checked = false;
                    q.studentInput[0].answer = "";
                    q.studentInput[0].type = "";
                    q.studentInput[0].notes = "";
                    note.val('');
                } else {
                    q.studentInput[0].type = "";
                }
            } else if (type == 2) {
                $.each($("input[name='multiple']:checked"), function() {
                    $(this).prop('checked', false);
                });
                q.studentInput[0].answer = "";
                q.studentInput[0].type = "";
                q.studentInput[0].notes = "";
                note.val('');
            } else {
                console.log('invalid type');
            }
            save("In progress");
            loadExam();
        } else {
            error.text('Please select on answer.');
            console.log("single Selected : [not selected any value] ");
        }
    }

    function renderQuestion() {
        if (currentQuestion != null) {
            var q = sampleExamData.questions[currentQuestion];
            var type = q.type;

            questionNo.html("Question No." + (currentQuestion + 1));
            question.html(q.question);
            options.html("");
            note.val(q.studentInput[0].notes);

            var optionsHtml = generateOptionsHtml(q);
            options.html(optionsHtml);

            if (questionDisabledStatus[currentQuestion]) {
                $('input[name="single"]').attr('disabled', true);
            }

            highlightSelectedAndCorrectAnswers(q);
        } else {
            alert('Please select the question.');
        }
    }

    function generateOptionsHtml(q) {
        var optionsHtml = "";
        for (var i = 1; i <= 4; i++) {
            var option = String.fromCharCode(64 + i); // A, B, C, D, E
            var optionText = q['options_' + i];
            optionsHtml += generateOptionHtml(option, optionText, q.studentInput[0].answer);
        }
        return "<tbody>" + optionsHtml + "</tbody>";
    }

    function generateOptionHtml(optionValue, optionText, selectedAnswer) {
        var checkedAttribute = selectedAnswer === optionValue ? 'checked="checked"' : '';
        return `<tr><td><div class="form-check">
                    <input class="form-check-input" type="radio" value="${optionValue}" name="single" ${checkedAttribute}>
                    <label class="form-check-label">${optionText}</label>
                </div></td></tr>`;
    }

    function highlightSelectedAndCorrectAnswers(q) {
        var selectedAnswer = q.studentInput[0].answer;
        var correctAnswer = q.answer;

        // Remove any existing background and text classes
        $('input[name="single"]').parent().removeClass('bg-success bg-danger bg-gradient');
        $('label.form-check-label').removeClass('text-light text-light');

        if (selectedAnswer !== null && selectedAnswer.length > 0) {
            var selectedInput = $(`input[name="single"][value="${selectedAnswer}"]`);
            var parentTd = selectedInput.closest('td');
            parentTd.addClass(selectedAnswer === correctAnswer ? 'bg-success bg-gradient' : 'bg-danger bg-gradient');
            
            var selectedLabel = parentTd.find('label.form-check-label');
            selectedLabel.addClass(selectedAnswer === correctAnswer ? 'text-light' : 'text-light');

            // Highlight correct answer in green
            var correctInput = $(`input[name="single"][value="${correctAnswer}"]`);
            var correctParentTd = correctInput.closest('td');
            correctParentTd.addClass('bg-success bg-gradient');
            
            var correctLabel = correctParentTd.find('label.form-check-label');
            correctLabel.addClass('text-light');
        }
    }

    function loadExam() {
        var examView = "<table   class='table table-striped table-hover'><tbody style='text-align: left;'>";
        examView += "<tr><td>Name</td><td>" + sampleExamData.exam.Name + "</td></tr>";
        examView += "<tr><td>Marks Per Question</td><td>" + sampleExamData.exam.MarksPerQuestion + "</td></tr>";
        examView += "<tr><td>Duration</td><td>" + sampleExamData.exam.ExamDuration + "</td></tr>";
        examView += "<tr><td>Start Date Time</td><td>" + sampleExamData.exam.ExamStartDateTime + "</td></tr>";
        examView += "<tr><td>Max Tab Switch Allow</td><td>" + sampleExamData.exam.TotalTabSwtiched + "/" + sampleExamData.exam.MaxTabSwitchAllow + "</td></tr>";
        examView += "<tr><td>Negative Makrs Per Question</td><td>" + sampleExamData.exam.NegativeMakrsPerQuestion + "</td></tr></tbody></table>";
        examDetails.html(examView);
        var questions = sampleExamData.questions;
        var questionsHtml = "";
        for (var x in questions) {
            var q = sampleExamData.questions[x];
            var type = q.studentInput[0].type;
            switch (type) {
                case ANSWERED:
                    questionsHtml += "<li><a href='#' class='" + ANSWERED + "' onClick='goto(" + x + ")'>" + (parseInt(x) + 1) + "</a></li>";
                    break;
                case MARKEDFORREVIEW:
                    questionsHtml += "<li><a href='#' class='" + MARKEDFORREVIEW + "' onClick='goto(" + x + ")'>" + (parseInt(x) + 1) + "</a></li>";
                    break;
                case NOTANSWERED:
                    questionsHtml += "<li><a href='#' class='" + NOTANSWERED + "' onClick='goto(" + x + ")'>" + (parseInt(x) + 1) + "</a></li>";
                    break;
                case ANSWEREDMARKEDFORREVIEW:
                    questionsHtml += "<li><a href='#' class='" + ANSWEREDMARKEDFORREVIEW + "' onClick='goto(" + x + ")'>" + (parseInt(x) + 1) + "</a></li>";
                    break;
                default:
                    questionsHtml += "<li><a class='' href='#' onClick='goto(" + x + ")'>" + (parseInt(x) + 1) + "</a></li>";
                    break
            }
        }
        listOfQuestions.html(questionsHtml);
    }

    function save(type) {
        $("#loading-spinner").show();
        $.ajax({
            url: web_url + 'save/' + sampleExamData.exam.Id,
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "questions_ans": JSON.stringify(sampleExamData),
                "typeAction": type
            },
            dataType: "json",
            success: function(result) {
                $("#loading-spinner").hide();
                if (result.status == true || result.message == "Exam are Over") {
                    swal({
                        title: "Congratulations!",
                        text: "You have completed the exam successfully.",
                        icon: "success",
                        button: "OK",
                    }).then(() => {
                        // Close the current tab and redirect to the exam URL
                        window.open(web_url + 'exam', '_self').close();
                        $.ajax({
                            url: web_url + 'exam',
                            type: "GET",
                            data: {
                                "_token": "{{ csrf_token() }}",
                            },
                            dataType: "json",
                            success: function(result) {
                            },
                            error: function(result) {
                            }
                        });
                    });
                }
            },
            error: function(result) {
                $("#loading-spinner").hide();
                // Handle errors if needed
            }
        });
    }

    window.onunload = refreshParent;
    function refreshParent() {
        window.opener.location.reload();
    }

    $(window).blur(function(e) {
        var allowTabSwitch = parseInt(sampleExamData.exam.MaxTabSwitchAllow);
        var tabSwitch = parseInt(sampleExamData.exam.TotalTabSwtiched);
        sampleExamData.exam.TotalTabSwtiched = tabSwitch + 1;
        if (tabSwitch >= allowTabSwitch) {
            swal({
                title: "Sorry",
                text: "Your Max Tab Switch Allow Reached",
                icon: "warning",
                buttons: false,
                timer: 5000,
            }).then(() => {
                save('MaxTabSwitchAllowReached');
            });
        }
        loadExam();
    });

    function hide(id) {
        var f = $('#' + id).attr("data-visible");
        if (f == "true") {
            $('#' + id).hide();
            var f = $('#' + id).attr("data-visible", "false");
        } else {
            var f = $('#' + id).attr("data-visible", "true");
            $('#' + id).show();
        }
    }

    function aZero(n) {
        return n.toString().length == 1 ? n = '0' + n : n;
    }
    window.addEventListener('devtoolschange', event => {
        alert('Is DevTools open:', event.detail.isOpen);
        swal({
                title: "Sorry",
                text: "Your DevTools Are open",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    save("DevToolComplete");
                }
            });
        setTimeout(function() {
            save("DevToolComplete");
        }, 1000);

    });
</script>