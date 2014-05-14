<?php
/**
 * This is a Alpha pagecontroller.
 *
 */

// Include the essential config-file which also creates the $alpha variable with its defaults.
include (__DIR__ . '/config.php');

$download = new CDownload ();

$intro = '    
     <p> Here you can read about my skills, academic background and and an overview of my areas of expertise. 
      You can also choose to download my C.V. (resume) which contains a shorter version of this information, and an attachment to it 
      if you wish to see more skills.</p> ';

$relevantSkillsProgramming = '  
              
                   
                              <ul class ="uList">
                                  <li>Requirements gathering and Analysis</li>                                
                                  <li>Problem analysis and resolution</li>
                                  <li>Object Oriented Design</li>                                  
                                  <li>Object Oriented Programming</li>
                                  <li>Software Documentation</li>    
                                  <li>Communications and Teamwork</li> 
                                  <li>Software testing and debugging</li>
                                  <li>Web design and development</li> 
                                  <li>Database design and delopment</li> 
                        
     
                               </ul>';

$relevantSkillsBusiness1 = '  <ul class ="uList">
                                 <b>finance and accounting:</b>
                                    <ul class ="uList">
                                        <li>Performed bookkeeping services on a monthly basis for client auditees. </li>
                                        <li>Carried out in-house audits for clients with assets valued in excess of $500 million.</li>
                                        <li>Performed accounting services for private investors and recommended investment alternatives.</li>
                                        <li>Adviced on investment needs to guardianship account holders in order to prevent legal action.</li>
                                     </ul>
                               </ul> 
      ';

$relevantSkillsBusiness2 = '     <ul class ="uList">
                                    <b>Finance and Accounting (ctd.):</b>       
                                    <ul class ="uList">
                                        <li>Worked closely with clients in a consulting capacity to streamline their accounting practices while keeping them in line with their annual audit.</li>
                                        <li>Prepared individual, partnership, corporate and payroll tax returns in a timely and accurate manner. </li>
                                        <li>Successfully rotated through three areas of accounting including audit, tax and consulting.  </li>
                                        <li>Evaluated the internal control structure and financial reporting systems of the client entities and recommended enhancements.</li>
                                    </ul> 
                                 </ul> 
                                 ';

$relevantSkillsBusiness3 = '
                                 <ul class ="uList">
                                    <b>Management:</b>
                                    <ul class ="uList">
                                        <li>Founded a computer hardware importing and consulting firm with considerable resource constraints and turned it into one of the leading companies in the local market within its category, invoicing over 360K Euros per quarter.</li>
                                        <li>Maintained inventory holding costs variable, and planned successful purchasing strategies, minimizing impact of low activity period effects on liquidity.</li>
                                        <li>Contracted and programmed ocean freight for high volume container based imports, in coordination with manufacturers, in order to minimize delivery time.</li>
                                        <li>Interviewed, filtered and recruited new personnel for sales, operations, marketing and logistics positions in order to gain competitiveness.</li>
                                    </ul>
                                 </ul>
                                 ';

$relevantSkillsBusiness4 = '

                           <li><b>Marketing:</b>
                                 <ul class ="uList">
                                     <li>Successfully implemented pricing strategies coherent with the market conditions at a particular time in a very hostile, competitive and rapidly changing market.</li>
                                     <li>Assisted international technology Fairs chiefly the CEBIT in Germany and SIMO in Spain in order to cultivate better business dealings with both manufacturers and clients.</li>
                                     <li>Planed, analyzed, implemented and coordinated successful marketing strategies through advertising in local printed media as well as on Internet pay sites</li>
                                 </ul>
                            </li>
                                 ';

$relevantSkillsCommunications1 = '                          
                                             <ul class ="uList">
                                                 <li>Secured exclusivity for featured components through negotiations with manufacturers in Asia and the US and signed legally binding contracts enforceable by law.</li>
                                                 <li>Maintained liason with client entities, promoted better business dealings and cultivated new relationships</li>
                                                 <li>Handled legal conflict though combining different legal and consulting tools in order to safeguard the interests of the company.</li>                                              
                                                 <li>Work in multinational and diverse virtual teams on a daily basis utilizing my language abilities</li>   
                                              </ul>                            
                                  
                                 ';

$relevantSkillsCommunications2 = '  <ul class ="uList">

                                        <li>Tracked and analyzed revenue from all products and reported directly to president of the company. Maintained liaison in Spanish, English and Swedish between clients and management.</li>
                                        <li>Recorded and maintained financial transactions on a timely basis and alerted upper-level management to costly omissions.</li>
                                        <li>Assisted manufacturers in developing a successful end product. Though creative and innovative ideas.</li>
                                        
                                    </ul> 
                                 ';

$programmingLanguages = '
                        <ul class ="uList">
                            <b>Object oriented and imperative:</b>
                              <ul class ="uList">
      
                                        <li>Java SE</li> 
                                        <li>ASP.NET</li> 
                                        <li>PHP</li>
                                        <li>C#</li>
                                        <li>C++</li>
                                        <li>C</li>
                               </ul>
                             </li>
                       
      
            ';

$databases = '
                      <ul class ="uList">
                           <b>Database design and development:</b>
                    
                              <ul class ="uList">
                                     <li>SQL</li> 
                                     <li>MySQL</li> 
                                     <li>SqlLite</li>
                                     <li>EER</li>
                                     <li>Chen Notation</li>
                               </ul>
                       
                        </ul> 

            ';
$otherProgramming = '
                      <ul class ="uList">
                          <b>Programming related technologies:</b>
                              <ul class ="uList">
                                     <li>XML</li>
                                     <li>Xhtml</li>
                                     <li>Html4</li>
                                     <li>Ado.Net</li>
                                     <li>Entity Framework</li>
                                     <li>Asp.Net MVC</li>
                                     <li>Asp.net Ajax</li>
                               </ul>
                        </ul>

            ';

$php = '
                       <ul class ="uList">
                           <b>Web Development PHP:</b>
                              <ul class ="uList">
                                     <li>Script Based PHP and HTML</li> 
                                     <li>Object Oriented PHP and Databases</li> 
                                     <li>PHP with Model view Controller</li>
                               </ul>
                        </ul> 
            
              ';

$java = '
                       <ul class ="uList">
                           <b>Java SE:</b>
                              <ul class ="uList">
                                     <li>Java I</li>
                                     <li>Java II</li>
                                     <li>Object Oriented Programming</li>
                                     <li>Java Applications Development</li>
                                     <li>Design Patterns</li>
                                     <li>Datacommunications for progrmmers</li>
                               </ul>
                        </ul>

              ';
$asp_net = '
                       <ul class ="uList">
                           <b>ASP.NET Web and Desktop applications development:</b>      
                              <ul class ="uList">
                                     <li>Programming in C#</li>
                                     <li>Advanced Programming C#</li>
                                     <li>XML</li>
                                     <li>ASP.NET Database Driven Web Development </li>
             
                               </ul>
                        </ul>

              ';
$c_cplus_plus = '
                       <ul class ="uList">
                         <b>C, C++ and System programming:</b>
                              <ul class ="uList">
                                     <li>Intro to C programming</li>
                                     <li>C programming and Matlab</li>
                                     <li>Datastructures and algorithms in C </li>
                                     <li>Unix System Programming </li>
                                     <li>Computer Systems in C</li>
                                     <li>C++ I</li>
                                     <li>C++ Object Oriented </li>
                               </ul>
                        </ul>

              ';

$interaction = '
                       <ul class ="uList">
                           <b>Misc</b>
                              <ul class ="uList">
                                     <li>User Interface Design and Evaluation</li>
         
                               </ul>
                        </ul>

              ';

$economics_law = '
                   
                         
                             <ul class ="uList">
                                     
                                     <li>Macro Economics</li>
                                     <li>Micro Economics</li>
                                     <li>Micro Applications Bussines</li>
                                     <li>Law of Business Contracts (Agency Law) </li>
                                     <li>Law of Business Organizations (Partnership Law)</li>
                                     <li>Business Policy (Corporate Law)</li>                                
                                     <li>Federal Income Taxation(Tax Law)</li>
                               </ul>
                          
                    

              ';

$accounting_finance = '
                      
                       
                              <ul class ="uList">
                                     <li>Principles of finance</li>
                                     <li>Corporate Finance</li>
                                     <li>Principles of Accounting</li>
                                     <li>Financial Accounting I</li>
                                     <li>Financial Accounting II</li>
                                     <li>Financial Accounting III</li>
                                     <li>Cost Accounting</li>
                                     <li>Quantitative Methods of Accounting</li>
                                     <li>Principles of Auditing</li>
                                     <li>Accounting Information Systems</li>
                                     
                               </ul>
                             
                        
                     ';

$marketing_management = '
                       
                              <ul class ="uList">                  
                                     <li>Business Organization and Management</li>
                                     <li>Marketing foundations</li>
                                     <li>Fundamentals of Management</li>
                                     <li>Production and Operations Management</li>
                                    
                               </ul>
                     

              ';

$political_sci_comm = '
                               <ul class ="uList">
                              <b>The first 5 units were part of pre-journalism</b>         
                                 <ul class ="uList">
                                        <li>Writing I</li>
                                        <li>Writing II</li>
                                        <li>Composition and Rethoric</li>
                                        <li>Speech communication</li>
                                        <li>Social Communications</li>
                                        <li>Sociology</li>
                                        <li>Western Civilization</li>
                                        <li>Medieval Europe</li>
                                        <li>American History I</li>
                                        <li>American History II</li>
                                        <li>American Government Practices</li>
                                        <li>State and Local Government</li>
                                        <li>Comparative Government</li>
                                  </ul>
                               </ul>
                    
              ';

$math = '
                       <ul class ="uList">
                            <b>Math and applied math</b>
                              <ul class ="uList">
                                     <li>Calculus I</li>
                                     <li>Calculus II</li>
                                     <li>Statistics</li>
                                 
                               </ul>
                        </ul>
              ';

$other_courses = '
                              <ul class ="uList">
                                     <li>Great Works of Litterature</li>
                                     <li>Major Issues in Philosofy <a href ="http://en.wikipedia.org/wiki/Douglas_P._Lackey" target="_blank">(Douglas P. Lackey)</a></li>
                                     <li>Anthropology</li>
                                     <li>Art Survey II</li>
                                     <li>History of Art</li>
                                     <li>Drafting</li>
                                     <li>Military Science <a href="http://en.wikipedia.org/wiki/Reserve_Officers%27_Training_Corps" target="_blank" >(ROTC)</a></li>
                                     <li>Using Books and Libraries</li>
                                     <Li>Elementary German</li>
                                     <Li>Fosils and Evolution</li>
                                     <Li>Physical Geology</li>
                                     
                                     
                               </ul>
              ';

$englishResume = '
      Download English version:
      <a href="./pdf/gabriel_nieva_cover_letter.pdf" download>Cover</a>|
      <a href="./pdf/gabriel_nieva_resume.pdf" download>Resume</a>|
      <a href="./pdf/gabriel_nieva_additional_experience.pdf" download>Additional experience</a>
      </fieldset>
';

$swedishResume = '
      
      Ladda ner svensk version:
      <a href="./pdf/gabriel_nieva_brev.pdf" download>Personligt brev</a>|
      <a href="./pdf/gabriel_nieva_cv.pdf" download>CV</a>|
      <a href="./pdf/gabriel_nieva_ytterligare_erfarenhet.pdf" download>Ytterligare erfarenhet</a>
      </fieldset> 
      
               ';

// declare the buttons

$html = null;
$html2 = null;

// <a href="pdf_server.php?file=gabriel_nieva_brev.pdf">Download my eBook</a>

// Do it and store it all in variables in the Alpha container.
$alpha ['title'] = "Resume / CV";
// here below in the EOD goes a related link above the header
$alpha ['above'] = <<<EOD
EOD;


$alpha ['header'] = <<<EOD
<img class='sitelogo' src='img/logo.svg' alt='Alpha Logo'/>
<span class='sitetitle'>Gabriel Nieva</span>
<span class='siteslogan'>A website about me</span>
EOD;

$alpha ['main'] = <<<EOD
<h1>{$alpha['title']}</h1>

<div class = "hero-unit">
     {$intro}
  
      <div class ="intro">
         {$englishResume}<br/>
         {$swedishResume}
      </div>
 
</div>

<div class ="row"></div>

<div class="row">
    <h2>Relevant programming skills</h2>
    
	   <div class = "container"> 
			 <div class = "row">
				 <div class="col-sm-3">
					 <h3>Programming languages</h3>
					  {$programmingLanguages}
				 </div>
				 <div class="col-sm-3">
					 <h3>Other Programming</h3>
					 {$otherProgramming}
				 </div>
				 <div class="col-sm-3">
					 <h3>Database</h3>
					 {$databases}
				 </div>  
			     <div class="col-sm-3">
				      <h3>Relevant skills</h3>
					{$relevantSkillsProgramming}
				  </div>				            
			 </div> 
	 </div> 
 </div> 
   

 <div class = "row"></div>
 
 <div class="row">
  
    <h2>Computer Science Courses <small><a href ="http://www.umu.se/" target="_blank">Umea Universitet</a> and other (Universities in Sweden)</small></h2>
    
		<div class = "container"> 
			 <div class = "row">
				 <div class="col-md-4">
					 <h3>Java</h3>
					  {$java}
				 </div>
				 <div class="col-md-4">
					 <h3>ASP.NET</h3>
					 {$asp_net}
				 </div>
				 <div class="col-md-4">
					 <h3>PHP</h3>
					 {$php}
				 </div>             
			 </div>
         </div>
         <div class = "container"> 
			 <div class = "row">
				 <div class="col-md-4">
					 <h3>C  & C++</h3>
					  {$c_cplus_plus}
				 </div>
				 <div class="col-md-4">
					 <h3>Math courses</h3>
					  {$math}
				 </div>
				 <div class="col-md-4">
					 <h3>Other courses</h3>
					  {$interaction}
				 </div>    
			 </div>
		</div> 
 </div> 

  <div class = "row"> </div>
  
 <div class= "row">
  
    <h2>Relevant bussiness skills</h2>
    
    <div class = "container"> 
            <div class = "row">
                <div class="col-md-4">
                    <h3>Relevant business skills 1</h3>
                     {$relevantSkillsBusiness1}
                </div>
                <div class="col-md-4">
                    <h3>Relevant business skills 2</h3>
                     {$relevantSkillsBusiness2}
                </div>
                <div class="col-md-4">
                    <h3>Relevant business skills 3</h3>
                     {$relevantSkillsBusiness3}
                </div>                
            </div>
         </div>
    
     
         
 </div>    

  <div class= "row">
  
    <h2>Business coursework <small>(City University of New York) <a href ="https://www.baruch.cuny.edu/" target="_blank">The Bernard M Baruch College</small></a> <small><a href ="http://en.wikipedia.org/wiki/Baruch_College" target="_blank">(more)  </a></small></h2>
    
  <div class = "container"> 
			 <div class = "row">
				 <div class="col-md-4">
					 <h3>Accounting and Finance</h3>
					  {$accounting_finance}
				 </div>
				 <div class="col-md-4">
					 <h3>Marketing and Management</h3>
					{$marketing_management}
				 </div>
				 <div class="col-md-4">
					 <h3>Economics and Law</h3>
					  {$economics_law}
				 </div>             
			 </div>
         </div>
    
     
         
 </div>     
    
 <div class = "row"></div>

 
  <div class ="row">
  
    <h2>Communications</h2>
     
         <div class = "container"> 
			 <div class = "row">
				 <div class="col-md-6">
					 <h3>Relevant communications skills  1</h3>
				   {$relevantSkillsCommunications1}
				 </div>
				 <div class="col-md-6">
					 <h3>Relevant communications skills 2</h3>
				   {$relevantSkillsCommunications2}
				</div>
			</div>
		</div>         
 </div>      
 
    <div class ="row">
  
    <h2>Communications coursework and miscellaneous coursework <small>(<a href ="http://www.wvu.edu/">WVU</a> and <a href ="http://www.fairmontstate.edu/" target="_blank"> Fairmont State university)</a></small></h2>
     
      <div class = "container"> 
			 <div class = "row">
				 <div class="col-md-6">
					 <h3>Political Science and Communications</h3>
					  {$political_sci_comm}       
				 </div>
				 <div class="col-md-6">
					 <h3>Other Courses</h3>
				     {$other_courses}
				 </div>
			 </div>
       </div>       
 </div>     


EOD;

$alpha ['footer1'] = <<<EOD
<footer><span class='sitefooter'>Copyright (c) Gabriel Nieva | <a href='https://github.com/bluetxxth'>Alpha på GitHub</a> | <a href='http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance'>Unicorn</a></span></footer>
EOD;
$alpha ['footer2'] = <<<EOD
<footer></footer>
EOD;

// Finally, leave it all to the rendering phase of Alpha.
include (ALPHA_THEME_PATH);