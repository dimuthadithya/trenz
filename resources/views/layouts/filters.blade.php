         <div class=" flex-grow-1 col-lg-3 col-md-6 col-12">
             <div class="accordion" id="accordionPanelsStayOpenExample">
                 <div class="accordion-item">
                     <h2 class="accordion-header">
                         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                             Filter by Category
                         </button>
                     </h2>
                     <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                         <div class="accordion-body">
                             @foreach ($categories as $category)
                             <x-checkbox id="jersey" value="jersey" label="Jersey" />
                             @endforeach
                         </div>
                     </div>
                 </div>
                 <div class="accordion-item">
                     <h2 class="accordion-header">
                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                             Filter by Colors
                         </button>
                     </h2>
                     <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                         <div class="accordion-body">
                             <x-checkbox id="black" value="black" label="Black" />
                             <x-checkbox id="white" value="white" label="White" />
                             <x-checkbox id="purple" value="purple" label="Purple" />
                             <x-checkbox id="orange" value="orange" label="Orange" />
                             <x-checkbox id="brown" value="brown" label="Brown" />
                             <x-checkbox id="grey" value="grey" label="Grey" />
                             <x-checkbox id="beige" value="beige" label="Beige" />
                             <x-checkbox id="navy" value="navy" label="Navy" />
                         </div>
                     </div>
                 </div>
                 <div class="accordion-item">
                     <h2 class="accordion-header">
                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                             Filter by Sizes
                         </button>
                     </h2>
                     <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                         <div class="accordion-body">
                             <x-checkbox id="xs" value="xs" label="XS" />
                             <x-checkbox id="s" value="s" label="S" />
                             <x-checkbox id="m" value="m" label="M" />
                             <x-checkbox id="l" value="l" label="L" />
                             <x-checkbox id="xl" value="xl" label="XL" />
                             <x-checkbox id="xxl" value="xxl" label="XXL" />
                             <x-checkbox id="xxxl" value="xxxl" label="XXXL" />
                         </div>
                     </div>
                 </div>
                 <div class="accordion-item">
                     <h2 class="accordion-header">
                         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                             Filter by Material
                         </button>
                     </h2>
                     <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                         <div class="accordion-body">
                             <x-checkbox id="cotton" value="cotton" label="Cotton" />
                             <x-checkbox id="polyester" value="polyester" label="Polyester" />
                             <x-checkbox id="silk" value="silk" label="Silk" />
                             <x-checkbox id="wool" value="wool" label="Wool" />
                             <x-checkbox id="leather" value="leather" label="Leather" />
                         </div>
                     </div>
                 </div>
             </div>
         </div>