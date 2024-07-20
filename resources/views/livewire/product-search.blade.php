<form wire:submit.prevent="search" action="#" class="header_search_form clearfix">
    <input wire:model="searchTerm" type="search" required="required" class="header_search_input"
        placeholder="Search for products...">
    <div class="custom_dropdown">
        <div class="custom_dropdown_list">
            <span class="custom_dropdown_placeholder clc">All Categories</span>
            <i class="fas fa-chevron-down"></i>
            <ul class="custom_list clc">
                <li><a class="clc" href="#">All Categories</a></li>
                <li><a class="clc" href="#">Computers</a></li>
                <li><a class="clc" href="#">Laptops</a></li>
                <li><a class="clc" href="#">Cameras</a></li>
                <li><a class="clc" href="#">Hardware</a></li>
                <li><a class="clc" href="#">Smartphones</a></li>
            </ul>
        </div>
    </div>
    <button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png"
            alt=""></button>
</form>
