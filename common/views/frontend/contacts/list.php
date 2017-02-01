<?php require_once 'header.php'; ?>
<!--==============================Content=================================-->
<div class="content"><div class="ic">More Website Templates @ TemplateMonster.com - February 10, 2014!</div>
    <div class="container_12">
        <div class="grid_5">
            <h3>CONTACT INFO</h3>
            <div class="map">
                <p>TemplateMonster provides 24/7 support for all its <span class="col1"><a href="http://www.templatemonster.com/website-templates.php" rel="nofollow">premium products</a></span>. Freebies go without it.</p>
                <p>If you have any questions regarding the customization of the chosen free theme, ask <span class="col1"><a href="http://www.templatetuning.com/" rel="nofollow">TemplateTuning</a></span> to help you on a paid basis.</p>
                <div class="clear"></div>
                <figure class="">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d23670.31987597593!2d24.76726288094616!3d42.133379053493115!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbg!4v1467229915160" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                </figure>
                <address>
                    <dl>
                        <dt>The Company Name Inc. <br>
                            8901 Marmora Road,<br>
                            Glasgow, D04 89GR.
                        </dt>
                        <dd><span>Freephone:</span>+1 800 559 6580</dd>
                        <dd><span>Telephone:</span>+1 800 603 6035</dd>
                        <dd><span>FAX:</span>+1 800 889 9898</dd>
                        <dd>E-mail: <a href="#" class="col1">mail@demolink.org</a></dd>
                    </dl>
                </address>
            </div>
        </div>
        <!------------------------FORM------------------------				-->
        <a name="here"></a>
        <div class="grid_6 prefix_1">
            <h3>GET IN TOUCH</h3>
            <form id="form" method="post" action="">
                <div class="success_wrapper">
                    <div class="success-message">Contact form submitted</div>
                </div>
                <label class="name">
                    <input type="text" placeholder="Name:" name="name" data-constraints="@Required @JustLetters" />
                    <span class="empty-message">*This field is required.</span>
                    <span class="error-message">*This is not a valid name.</span>
                </label>
                <label class="email">
                    <input type="text" placeholder="Email:" name="email" data-constraints="@Required @Email" />
                    <span class="empty-message">*This field is required.</span>
                    <span class="error-message">*This is not a valid email.</span>
                </label>
                <label class="phone">
                    <input type="text" placeholder="Phone:" name="phone" data-constraints="@Required @Phone" />
                    <span class="empty-message">*This field is required.</span>
                    <span class="error-message">*This is not a valid email.</span>
                </label>

                <label class="message">
                    <textarea placeholder="Message:" name="message" data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                    <span class="empty-message">*This field is required.</span>
                    <span class="error-message">*The message is too short.</span>
                </label>
                <div>
                    <div class="clear"></div>
                    <div class="btns">
                        <a href="#" data-type="reset" class="btn">Clear</a>
                        <input type="submit" name="submit" value="Send"  />

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




<!--==============================footer=================================-->
<?php require_once 'footer.php' ?>

