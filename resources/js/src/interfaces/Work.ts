export interface Work {
    id: number;
    order: string;
    title: string;
    desc_card: string;
    desc_full: string;
    work_examples: object;
    cover_full: string;
    cover_card: string;
    text_detailed_1;
    text_detailed_2;
    cover_desc_detailed_1_small;
    cover_desc_detailed_1_full;
    cover_desc_detailed_2_small;
    cover_desc_detailed_2_full;
    link: string;
    stacks: [{
        name: string,
        color: string
    }];

}

