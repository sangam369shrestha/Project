<?php include_once 'admin_head.php' ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="cont">
    <div class="tab_buttons">
            <ul class="tab_lists">
                <li id="tab2" class="active"><p>Departments</p></li>
                <li id="tab1"><p>Managers</p></li>
                <li id="tab3"><p>Projects</p></li>
            </ul>
        </div>
        
        <div class="tabs_content">
            <div class="active" id="first">
                <h2>Departments</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Unde dolorum dolor voluptates 
                    facere quod esse, illum odio, nihil molestias fugiat debitis assumenda excepturi nulla veritatis corrupti, aut soluta doloremque officiis
                     beatae ipsam. Voluptatem in repellat ratione est, ut accusamus quibusdam?</p>
            </div>
            <div id="second">
                <h2>Managers</h2>
                
            </div>
            
            <div id="third">
                <h2>Projects</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas adipisci, 
                    excepturi commodi eum, nam reprehenderit ipsam nemo 
                    aliquid praesentium esse doloribus quidem! Cumque, ut laborum.
                jhsdbjahvsjhvhgjavshc sjhbcjahvs kjahbscjhajhsjhbjhsvc lorem new ipsad germ frog desmn yrt ekrg</p>
            </div>
        </div>
</div>
        
    
    <script>
        let tabs = document.querySelectorAll('.tab_lists li');
        let tab_contents = document.querySelectorAll('.tabs_content div');

        // console.log(tabs, tab_contents)
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                tabs.forEach((tab) => {
                    tab.classList.remove('active');
                });
                tab_contents.forEach((content) => {
                    content.classList.remove('active');
                });
                tabs[index].classList.add('active');
                tab_contents[index].classList.add('active');
                
            })
        })
    </script>
    <script>
        $(document).ready(function (){
            $('#tab1').click(function(){
                $.ajax({
                    url :'man_insert.php',
                    method: 'get',
                    success: function (response){
                        $('#second').html(response);
                    }
                    error: function () {
                        // Handle errors
                        $("#second").html("<p>Failed to load content.</p>");
                    }
                })
            })
        })
    </script>
<?php include 'admin-footer.php'; ?>