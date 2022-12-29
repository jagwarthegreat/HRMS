import{u as n,o as c,g as _,d as o,f as p,h as a,l as d,b as s}from"./app.ad2c8530.js";const m={class:"modal fade",id:"workExperienceModal",tabindex:"-1","aria-labelledby":"workExperienceModal","aria-hidden":"true"},b={class:"modal-dialog"},u={class:"modal-content"},f=["onSubmit"],v=o("div",{class:"modal-header"},[o("h5",{class:"modal-title",id:"workExperienceModal"}," Work Experience "),o("button",{type:"button",class:"btn-close","data-coreui-dismiss":"modal","aria-label":"Close"})],-1),y={class:"modal-body"},h={class:"row g-3"},x={class:"col-12"},j=o("label",{for:"prev_company",class:"form-label"},"Previous Company",-1),k={class:"col-12"},w=o("label",{for:"jobTitle",class:"form-label"},"Job Title",-1),E={class:"col-12"},T=o("label",{for:"from_date",class:"form-label"},"From",-1),M={class:"col-12"},V=o("label",{for:"to_date",class:"form-label"},"To",-1),S={class:"col-12"},U=o("label",{for:"job_desc",class:"form-label"},"Job description",-1),g=o("div",{class:"modal-footer"},[o("button",{type:"submit",class:"btn btn-sm btn-primary"}," Create Experience ")],-1),J={__name:"WorkExperienceModal",props:{employee_id:String},setup(i){const e=n({prev_company:"",jobTitle:"",from_date:"",to_date:"",job_desc:"",employee_id:i.employee_id}),r=()=>{e.post(route("employee.workexp.store"),{onSuccess:()=>{e.reset(["prev_company","jobTitle","from_date","to_date","job_desc"]),$("#workExperienceModal").modal("hide")}})};return(C,t)=>(c(),_("div",m,[o("div",b,[o("div",u,[o("form",{onSubmit:p(r,["prevent"])},[v,o("div",y,[o("div",h,[o("div",x,[j,a(o("input",{type:"text",class:"form-control",id:"prev_company","onUpdate:modelValue":t[0]||(t[0]=l=>s(e).prev_company=l)},null,512),[[d,s(e).prev_company]])]),o("div",k,[w,a(o("input",{type:"text",class:"form-control",id:"jobTitle","onUpdate:modelValue":t[1]||(t[1]=l=>s(e).jobTitle=l)},null,512),[[d,s(e).jobTitle]])]),o("div",E,[T,a(o("input",{type:"date",class:"form-control",id:"from_date","onUpdate:modelValue":t[2]||(t[2]=l=>s(e).from_date=l)},null,512),[[d,s(e).from_date]])]),o("div",M,[V,a(o("input",{type:"date",class:"form-control",id:"to_date","onUpdate:modelValue":t[3]||(t[3]=l=>s(e).to_date=l)},null,512),[[d,s(e).to_date]])]),o("div",S,[U,a(o("input",{type:"text",class:"form-control",id:"job_desc","onUpdate:modelValue":t[4]||(t[4]=l=>s(e).job_desc=l)},null,512),[[d,s(e).job_desc]])])])]),g],40,f)])])]))}};export{J as default};
