
import requette from "./requette";

const getAllCategorie = async (url:string) => {
    const response = await requette(url);
    return response;
}
const postCategorie = async (url:string, object_body?:{name:string}) => {
    const form = new FormData();
    form.append("name", object_body?.name);

    const response = await requette(url, {
        method: "POST",
        body: form,
        headers: {
            "Content-Type": "application/json",
        }
    });
    return response;
}
export {getAllCategorie, postCategorie};