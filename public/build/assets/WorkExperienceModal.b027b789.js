import{u as p,o as _,g as m,d as o,f as b,h as l,l as d,b as s,v as r,t as i,n as f}from"./app.c4c2e632.js";const v={class:"modal fade",id:"workExperienceModal",tabindex:"-1","aria-labelledby":"workExperienceModal","aria-hidden":"true"},u={class:"modal-dialog"},y={class:"modal-content"},k=["onSubmit"],h=o("div",{class:"modal-header"},[o("h5",{class:"modal-title",id:"workExperienceModal"}," Work Experience "),o("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),j={class:"modal-body"},x={class:"row g-3"},w={class:"col-12"},T=o("label",{for:"prev_company",class:"form-label"},"Previous Company",-1),E={class:"col-12"},M=o("label",{for:"jobTitle",class:"form-label"},"Job Title",-1),S={class:"col-12"},g=o("label",{for:"from_date",class:"form-label"},"From",-1),V={class:"col-12"},U=o("label",{for:"to_date",class:"form-label"},"To",-1),C={class:"col-12"},B=o("label",{for:"job_desc",class:"form-label"},"Job description",-1),D={class:"modal-footer"},F=["disabled"],z={__name:"WorkExperienceModal",props:{employee_id:Number},setup(c){const e=p({prev_company:"",jobTitle:"",from_date:"",to_date:"",job_desc:"",employee_id:c.employee_id}),n=()=>{e.post(route("employee.workexp.store"),{preserveScroll:!0,onSuccess:()=>{e.reset("prev_company","jobTitle","from_date","to_date","job_desc"),$("#workExperienceModal").modal("hide")}})};return(N,t)=>(_(),m("div",v,[o("div",u,[o("div",y,[o("form",{onSubmit:b(n,["prevent"])},[h,o("div",j,[o("div",x,[o("div",w,[T,l(o("input",{type:"text",class:"form-control",id:"prev_company","onUpdate:modelValue":t[0]||(t[0]=a=>s(e).prev_company=a)},null,512),[[d,s(e).prev_company]]),l(o("div",{class:"invalid-feedback",style:{display:"block"}},i(s(e).errors.prev_company),513),[[r,s(e).errors.prev_company]])]),o("div",E,[M,l(o("input",{type:"text",class:"form-control",id:"jobTitle","onUpdate:modelValue":t[1]||(t[1]=a=>s(e).jobTitle=a)},null,512),[[d,s(e).jobTitle]]),l(o("div",{class:"invalid-feedback",style:{display:"block"}},i(s(e).errors.jobTitle),513),[[r,s(e).errors.jobTitle]])]),o("div",S,[g,l(o("input",{type:"date",class:"form-control",id:"from_date","onUpdate:modelValue":t[2]||(t[2]=a=>s(e).from_date=a)},null,512),[[d,s(e).from_date]]),l(o("div",{class:"invalid-feedback",style:{display:"block"}},i(s(e).errors.from_date),513),[[r,s(e).errors.from_date]])]),o("div",V,[U,l(o("input",{type:"date",class:"form-control",id:"to_date","onUpdate:modelValue":t[3]||(t[3]=a=>s(e).to_date=a)},null,512),[[d,s(e).to_date]]),l(o("div",{class:"invalid-feedback",style:{display:"block"}},i(s(e).errors.to_date),513),[[r,s(e).errors.to_date]])]),o("div",C,[B,l(o("input",{type:"text",class:"form-control",id:"job_desc","onUpdate:modelValue":t[4]||(t[4]=a=>s(e).job_desc=a)},null,512),[[d,s(e).job_desc]]),l(o("div",{class:"invalid-feedback",style:{display:"block"}},i(s(e).errors.job_desc),513),[[r,s(e).errors.job_desc]])])])]),o("div",D,[o("button",{type:"submit",class:f(["btn btn-sm btn-primary",{"opacity-25":s(e).processing}]),disabled:s(e).processing}," Create Experience ",10,F)])],40,k)])])]))}};export{z as default};