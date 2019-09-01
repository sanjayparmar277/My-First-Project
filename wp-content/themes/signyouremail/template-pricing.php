<?php
/**
 * Template Name: Pricing
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package signyouremail
 */
?>
<?php  echo get_header(); ?>
<section class="content-wrapper section">
   <div class="container">
      <h1 class="title is-1 has-text-centered">Plans for all types of professoinals</h1>
      <p class="subtitle is-3 has-text-centered">Choose Your Plan and Get Started</p>
      <div class="plans-length has-text-centered">
         <span :class="{'active': !planAnnual}" @click="planAnnual = false">Monthly</span>
         <input type="checkbox" class="switch-box" id="switch" v-model="planAnnual" checked="planAnnual"/>
         <label for="switch" class="switch">Toggle</label>
         <span :class="{'active': planAnnual}" @click="planAnnual = true">Yearly <span class="annual-save-text has-text-primary">(Save 40%)</span></span>
      </div>
      <div class="columns is-desktop has-text-centered" v-cloak>
         <div class="column is-8-desktop is-offset-2-desktop is-12">
            <div class="box">
               <div class="columns plans">
                  <div class="column is-6 plan">
                     <div class="price-block">
                        <h3 class="title is-4 plan-name is-spaced">Free</h3>
                        <p class="title is-2">$0.00</p>
                        <p class="subtitle is-5">Forever</p>
                        <br>
                        <a class="button is-primary is-medium has-extra-padding" @click.prevent="$store.commit('toggleSignup')">Sign Up</a>
                     </div>
                     <div>
                        <ul class="plan-features">
                           <li>1 Signature</li>
                           <li>Basic Generator</li>
                           <li>Includes Signmyemails Branding</li>
                        </ul>
                     </div>
                  </div>
                  <div class="column is-6 plan">
                     <div class="price-block">
                        <h3 class="title is-4 plan-name is-spaced">Pro</h3>
                        <p class="title is-2">${{ selectedPlanFull['price'] }}<span class="is-size-5">/mo</span></p>
                        <p class="subtitle is-5">Billed {{ selectedPlanFull['length'] }}</p>
                        <div class="field">
                           <div class="control has-text-centered">
                              <div class="select is-medium">
                                 <select v-model="selectedPlan">
                                    <option 
                                       v-for="plan in plans"
                                       v-if="plan.length == billingPeriod &&
                                       plan.batch == activePlanFull.batch"
                                       :key="plan.path"
                                       :value="plan.path"
                                       :disabled="plan.allowed_signatures < activePlanFull.allowed_signatures">
                                       {{ plan.allowed_signatures > 1000 ? 'Unlimited' : plan.allowed_signatures }} Signatures
                                    </option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <br>
                        <a class="button is-primary is-medium has-extra-padding"
                           @click="$store.commit('toggleSignup')">Sign Up</a>
                     </div>
                     <div>
                        <ul class="plan-features">
                           <li>
                              <span class="icon has-text-primary"><i class="icon-check"></i></span>
                              <span>Unlock All Pro Features</span>
                           </li>
                           <li>
                              <span class="icon has-text-primary"><i class="icon-check"></i></span>
                              <span>Ability To Duplicate Signatures</span>
                           </li>
                           <li>
                              <span class="icon has-text-primary"><i class="icon-check"></i></span>
                              <span>Ability To Create Generators</span>
                           </li>
                           <li>
                              <span class="icon has-text-primary"><i class="icon-check"></i></span>
                              <span>Download Signatures</span>
                           </li>
                           <li>
                              <span class="icon has-text-primary"><i class="icon-check"></i></span>
                              <span>Remove Signmyemails Branding</span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="message is-primary">
               <p class="message-body has-text-centered">
                  All Our Plans Come With <strong>7 Days Money-Back Guarantee.</strong> No Questions Asked.
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
<?php  echo get_footer(); ?>